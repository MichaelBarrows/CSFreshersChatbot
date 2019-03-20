<?php

/**
 * Chatbot Conversation
 *
 * This file handles all conversation with the user, including identifying
 * what the user is asking, identifying the correct response and sending it to
 * the interface.
 * The conversation also handles stopping the conversation and error resolution.
 *
 * @author Michael Barrows <contact@michaelbarrows.co.uk>
 */

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Botman\Botman\Messages\Incoming\IncomingMessage;
use Botman\Botman\Messages\Incoming\Answer as BMAnswer;
use BotMan\BotMan\Messages\Outgoing\Question as BMQuestion;
use Botman\Botman\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use GuzzleHttp\Client;

use App\Topic as CSTopic;
use App\Question as CSQuestion;
use App\Keyword as CSKeyword;
use App\FollowUpOption as CSFUOption;
use App\FollowUpResponse as CSFUResponse;
use App\UserId;
use App\ChatbotSettings;


class ChatbotConversation extends Conversation {
    // Variables used to persist user data across functions
    protected $question;
    protected $user_query;
    protected $user_response_words;
    protected $user_keywords;
    protected $user_id;
    protected $keyword_api;

    /**
     * Introduction()
     *
     * This function initiates the conversation with the user and sends follow
     * up requests for information so that the chatbot can handle the user input
     * and calls the getUserId() function so that a userId can be sent to the
     * interface and used as a cookie.
     * The users input is checked and the keywords are extracted using the API,
     * then the identifyQuestion() function is called.
     *
     * @param string $text  Question to be sent to the user.
     */
    public function introduction($text) {
        $this->user_id = $this->getUserId();
        $additionalparameters = ["userId" => $this->user_id];
        $this->ask($text, function(BMAnswer $user_response) {
            $this->user_query = $user_response;
            if (!$this->checkUserInput($user_response)) {
                $this->getKeywordsFromAPI($user_response);
                $this->identifyQuestion();
            }
        }, $additionalparameters);
    }

    /**
     * getUserId()
     *
     * This function identifies if the user has an ID assigned to them. If the
     * userId sent by the interface is zero, the user does not have a cookie
     * containing a userId and needs to be assigned one, and the assignUserID()
     * function is called to complete that, otherwise the ID sent by the
     * interface is returned.
     */
    public function getUserId() {
        if ($this->bot->getUser()->getId() == 0) {
            return $this->assignUserID();
        } else {
            return $this->bot->getUser()->getId();
        }
    }

    /**
     * assignUserID()
     *
     * This function assigns a user ID by calling the addID() function and then
     * retrieving the last ID in the userId model.
     * If the userid is not set, the model is empty and the user is assigned the
     * id of 1.
     */
    public function assignUserID() {
        $this->addID();
        $userid = UserId::get()->last();
        if (isset($userid)) {
            $userid = $userid->id;
        } else {
            $userid = 1;
        }
        return $userid;
    }

    /**
     * addID()
     *
     * The addID() function inserts a new ID into the UserID model and saves it.
     */
    public function addID() {
        $userID = new UserId;
        $userID->save();
        return;
    }

    /**
     * checkUserInput()
     *
     * This function checks the users input to see if it matches certain words
     * that should not be evaluated as a question.
     * If the users query matches "help", the help() function is called; if
     * "stop" or "bye" are matched, the conversation is terminated using the
     * goodbye() function; if "hello" is matched, the conversation is run from
     * the beginning using the run() function.
     * If the user input doesn't match any of the words, false is returned so
     * that execution can continue.
     *
     * @param string $userinput  Text that the user sent.
     */
    public function checkUserInput($userinput) {
        $userinput = strtolower($userinput);
        if ($userinput == "help") {
            $this->help();
            return true;
        } else if ($userinput == "stop" or $userinput == "bye") {
            $this->goodbye();
            return true;
        } else if ($userinput == "hello") {
            $this->run();
            return true;
        } else {
           return false;
        }
    }

    /**
     * followUp()
     *
     * This function calls the introduction function with the follow up text.
     */
    public function followUp() {
        $this->introduction("Is there anything else I can help you with?");
    }

    /**
     * getKeywordsFromAPI()
     *
     * This function sends the $user_response parameter to an API that extracts
     * keywords from the query and returns the keywords.
     * The words in the keyword response are split by spaces and then stored
     * for use in other functions.
     *
     * @param string $user_response  Text that the user sent to the chatbot.
     */
    public function getKeywordsFromAPI($user_response) {
        if ($this->keyword_api == "true") {
            $this->user_response_words = preg_split("/[\s,-?!]+/", $user_response->getText());
            $client = new Client(['base_uri' => 'http://localhost:5000']);
            $api_response = $client->request('POST', '/?query=' . $user_response);
            $response = json_decode($api_response->getBody());
            $this->user_keywords = preg_split("/[\s,-?!]+/", $response->response);
            return;
        } else {
            $this->user_keywords = preg_split("/[\s,-?!]+/", $this->user_query);
            $this->user_response_words = preg_split("/[\s,-?!]+/", $user_response->getText());
            return;
        }
    }

    /**
     * identifyQuestion()
     *
     * This function attempts to match a users query to a question by counting
     * keyword matches between the keywords for the questions and the keywords
     * in the users query (previously extracted).
     * This is completed by looping over the keywords in the users query whilst
     * looping over the keywords in the keywords table.
     * If a match is found, the question id field is stored in an associative
     * array ($keyword_count) with the value being the count of how many
     * keywords in the query keywords match question keywords.
     * If more than one question id exists in the associative array, it is
     * sorted in decending order of the counts and it is looped over to
     * determine if the count values are the same for the first and subsequent
     * values.
     * If a tie is not once the counter has reached the value 2 (2nd element),
     * then the first question id is the best match and this is then set and
     * processed, otherwise the tieBreaker() function is called to try and
     * break the tie.
     * If no matches are found, an error is sent to the user.
     */
    public function identifyQuestion() {
        $keyword_count = array();
        foreach ($this->user_keywords as $word) {
            $keywords = CSKeyword::all();
            foreach ($keywords as $keyword) {
                if (strtolower($word) == strtolower($keyword->keyword)) {
                    foreach($keyword->questions as $question) {
                        if (isset($keyword_count[$question->id])) {
                            $keyword_count[$question->id] += 1;
                        } else {
                            $keyword_count[$question->id] = 1;
                        }
                    }
                }
            }
        }
        if (count($keyword_count) >= 1) {
            arsort($keyword_count);
            $prev_count = 0;
            $counter = 0;
            foreach($keyword_count as $question => $count) {
                if ($prev_count == $count) {
                    $tie = true;
                }
                $prev_count = $count;
                $counter += 1;
                if ($counter >= 2 and !isset($tie)) {
                    break;
                } else {
                    continue;
                }
            }
            $question_matches = array_slice($keyword_count, 0, $counter, true);
            if (count($question_matches) == 1) {
                foreach($question_matches as $question_id => $count) {
                    $this->question = CSQuestion::findOrFail($question_id);
                    $this->processResponse($this->identifyResponseType($this->question));
                }
            } else {
                $this->tieBreaker($question_matches);
            }
        } else {
            $this->textResponse("Sorry, I don't know about that question. Please ask me something else.");
            return $this->followUp();
        }
    }

    /**
     * identifyResponseType()
     *
     * This function identifies whether the question has an answer or a folow up
     * question, so that the appropriate response can be sent back to the user.
     * The function also determines if the users query (not keywords) match
     * any of the follow up questions options, as this can be sent to
     * the user rather than the follow up question.
     *
     * @param model $question  The question model selected based on the users
     * query
     */
    public function identifyResponseType($question) {
        if ($question->answers()->exists()) {
            return 0;
        } elseif ($question->fu_question()->exists()) {
            $number_of_option_matches = $this->optionMatches($question->fu_question, 0);
            if ($number_of_option_matches == 0 or $number_of_option_matches > 1) {
                return 1;
            } elseif ($number_of_option_matches == 1) {
                return 2;
            }
        } else {
            return 3;
        }
    }

    /**
     * optionMatches()
     *
     * This method is used to determine the number of option matches between a
     * users query and the follow up question.
     * This is completed by counting the number of words in the option and
     * joining the users query from the start with the end position matching the
     * count of the option words.
     * If a match is not found, the start and end positions are incremented by
     * one until the whole user query has been evaluated or a match is found.
     * This is completed for each of the follow uo question options.
     * If the mode parameter is set to 0, the function only counts matches and
     * returns the counter, if it is set to 1, the matching option is returned.
     *
     * @param model   $follow_up_question  The follow up question model
     * @param integer $mode                The mode to be run (0 = count, 1 =
     *                                     return option)
     */
    public function optionMatches($follow_up_question, $mode) {
        if ($mode == 0) {
            $option_match_count = 0;
        }
        foreach($follow_up_question->fu_options as $option) {
            $option_words = preg_split("/[\s,-?!]+/", $option->option);
            $option_word_count = count($option_words);
            foreach($this->user_response_words as $word_id => $word) {
                if (count($this->user_response_words) - $option_word_count >= $word_id) {
                    $concatenated_user_response = $this->concatenateUserResponse($option_word_count, $word_id);
                } else {
                    break;
                }
                if (strtolower($option->option) == strtolower($concatenated_user_response)) {
                    if ($mode == 0) {
                        $option_match_count += 1;
                    } else if ($mode == 1) {
                        return $option;
                    }
                    break;
                }
            }
        }
        return $option_match_count;
    }

    /**
     * concatenateArray()
     *
     * This function loops over elements in an array and appends them to a
     * string which is then returned.
     *
     * @param array $array  Array of elements to be merged into a string.
     */
    public function concatenateArray($array) {
        foreach ($array as $element) {
            if ($array[0] == $element) {
                $concatenated_array = $element;
            } else {
                $concatenated_array = $concatenated_array . " " . $element;
            }
        }
        return $concatenated_array;
    }

    /**
     * concatenateUserResponse()
     *
     * This function extracts a section of the users query and merges the words
     * into a string which is then returned.
     *
     * @param integer $number_of_words    Number of words to be extracted from
     *                                    the users query.
     * @param integer $starting_position  Position within the users query to
     *                                    slice from.
     */
    public function concatenateUserResponse($number_of_words, $starting_position) {
        $user_words = array_slice($this->user_response_words, $starting_position, $number_of_words);
        $concatenated_user_words = $this->concatenateArray($user_words);
        return $concatenated_user_words;
    }

    /**
     * processReponse()
     *
     * This function returns the appropriate response for the type provided.
     * If the type has a value of 1, the question has an answer and the
     * answerResponse function is called.
     * If the type parameter has a value of 1, then the followUpOptionResponse
     * function is called.
     * If the type parameter has a value of 2, a follow up question option
     * matches the users query.
     * The number of option matches is identified and then the response is split
     * to identify if it contains a link, which is handled within this function.
     * If the response is text only, the response is passed to the textResponse
     * function to be sent to the user.
     *
     * @param integer $type  Number representing the type of response to be sent
     */
    public function processResponse ($type) {
        if ($type == 0) {
            return $this->answerResponse();
        } else if ($type == 1) {
            return $this->followUpOptionResponse();
        } else if ($type == 2) {
            $option = $this->optionMatches($this->question->fu_question, 1);
            $response_bits = preg_split("/[\s]+/", $option->fu_responses[0]->response);
            if ($response_bits[0] == "link") {
                $this->say($this->question->fu_question->text, ['actions' =>
                    ['0' =>
                        ['name' => $option->option,
                         'text' => $option->option,
                         'value' => $response_bits[1],
                         'type' => 'button']]]);
            } else {
                foreach($option->fu_responses as $response) {
                    $this->textResponse($response->response);
                }
            }
            return $this->followUp();
        } else {
            $this->textResponse("I don't have the answer to that question.");
            return $this->followUp();
        }
    }

    /**
     * tieBreaker()
     *
     * This function attempts to break the tie by identifying any option matches
     * to follow up questions; the more option matches found, the more chance
     * of it being the question the user required.
     * If the tie cannot be broken, the user is provided with a list of
     * questions as to which their query matched, so that they can identify the
     * question required.
     * The answer to the selected question is returned to the user, unless they
     * selected the option indicating that none matched, in which case an error
     * message is returned.
     * This function will take the users response and attempt to find the
     * question. if the user submitted a question id (by clicking an option),
     * the question is sent to the user, otherwise, the user input is processed
     * as a fresh response and the whole process of identifying the users
     * question is completed from the beginning.
     *
     * @param array $ties  Array of question ids and counts
     */
    public function tieBreaker($ties) {
        $scores = array();
        foreach ($ties as $question_id => $count) {
            $scores[$question_id] = $count;
            $question = CSQuestion::findOrFail($question_id);
            $responseType = $this->identifyResponseType($question);
            $scores[$question_id] += $responseType;
            if ($responseType == 1 or $responseType == 2) {
                $scores[$question_id] += $this->optionMatches($question->fu_question, 0);
            }
        }
        arsort($scores);
        $prev_score = 0;
        $counter = 0;
        foreach($scores as $question_id => $score) {
            if ($prev_score == $score) {
                $tie = true;
            }
            $prev_score = $score;
            $counter += 1;
            if ($counter >= 2 and !isset($tie)) {
                break;
            } else {
                continue;
            }
        }
        if (isset($tie)) {
            $ask_question = BMQuestion::create("I'm not sure which question you wanted the answer to");
            $counter = 1;
            foreach ($scores as $question_id => $score) {
                $question = CSQuestion::findOrFail($question_id);
                $ask_question->addButton(Button::create($question->text)->value($question->id));
            }
            $ask_question->addButton(Button::create("None of these")->value(0));
            $this->ask($ask_question, function(BMAnswer $user_response) {
                $this->user_query = $user_response->getText();
                if (!$this->checkUserInput($user_response)) {
                    if ($user_response->getText() == "0") {
                        $this->textResponse("Sorry none of these match, please try again");
                        return $this->followUp();
                    } else {
                        $this->user_query = $user_response->getText();
                        try {
                            $this->question = CSQuestion::findOrFail($user_response->getValue());
                        }
                        catch (ModelNotFoundException $e) {
                            $this->user_query = $user_response;
                            $this->getKeywordsFromAPI($user_response);
                            return $this->identifyQuestion();
                        }
                        return $this->processResponse($this->identifyResponseType($this->question));
                    }
                }
            });
        } else {
            foreach ($scores as $question_id => $score) {
                $this->question = CSQuestion::findOrFail($question_id);
                break;
            }
            return $this->processResponse($this->identifyResponseType($this->question));
        }
    }

    /**
     * textResponse()
     *
     * This function sends the text to the user interface.
     *
     * @param string $response  Text to be sent to the user.
     */
    public function textResponse($response) {
        return $this->say($response);
    }

    /**
     * answerResponse()
     *
     * This function returns answer responses to the user and calls the followUp
     * method to continue the conversation.
     */
    public function answerResponse() {
        if (isset($this->question->answers)) {
            foreach ($this->question->answers as $answer) {
                $this->textResponse($answer->text);
            }
        } else {
            $this->textResponse("Something went wrong");
        }
        return $this->followUp();
    }

    /**
     * followUpOptionResponse()
     *
     * This function sends the follow up question to the user and processes the
     * response from the user and returns the answer to the selected option.
     * If the response contains a link, the option value is the link rather than
     * the ID of the option.
     * The users response is checked for words that shouldn't be processed as
     * text.
     * If the user entered text rather than selected an option, a question is
     * attempted to be selected, if it can't be, then the whole process of
     * identifying a question is restarted.
     * If an option does not have a response, then an error is returned to the
     * user.
     */
    public function followUpOptionResponse() {
        if (isset($this->question)) {
            $question = BMQuestion::create($this->question->fu_question->text);
            foreach ($this->question->fu_question->fu_options as $option) {
                if (count($option->fu_responses) == 1) {
                    $response_bits = preg_split("/[\s]+/", $option->fu_responses[0]->response);
                    if ($response_bits[0] == "link") {
                        $question->addButton(Button::create($option->option)->value($response_bits[1]));
                    } else {
                        $question->addButton(Button::create($option->option)->value($option->id));
                    }
                } else {
                    $question->addButton(Button::create($option->option)->value($option->id));
                }
            }
            $this->ask($question, function(BMAnswer $user_response) {
                if (!$this->checkUserInput($user_response)) {
                    foreach ($this->question->fu_question->fu_options as $option) {
                        if ($user_response->getValue() == $option->id or strtolower($user_response->getText()) == strtolower($option->option)) {
                            if (strtolower($user_response->getText()) == strtolower($option->option)) {
                                $response_value = $option->id;
                            } else {
                                $response_value = $user_response->getValue();
                            }
                            $val_in_array = true;
                            break;
                        }
                    }
                    if (isset($val_in_array)) {
                        $this->user_query = $user_response->getText();
                        $selectedOption = CSFUOption::findOrFail($response_value);
                        $this->user_query = $selectedOption->option;
                        if (count($selectedOption->fu_responses) >= 1) {
                            foreach ($selectedOption->fu_responses as $response) {
                                $this->textResponse($response->response);
                            }
                        } else {
                            $this->textResponse("Sorry, I don't have answers for that option. Please ask me something else.");
                        }
                    return $this->followUp();
                } else {
                    $this->user_query = $user_response->getText();
                    try {
                        $this->question = CSQuestion::findOrFail($user_response->getValue());
                    }
                    catch (ModelNotFoundException $e) {
                        $this->user_query = $user_response;
                        $this->getKeywordsFromAPI($user_response);
                        return $this->identifyQuestion();
                    }
                }
            }
        });
        } else {
            $this->textResponse("Something went wrong");
            return $this->followUp();
        }
    }

    /**
     * help()
     *
     * This function returns a list of topics to the user, when the help button
     * is clicked or the word "help" is sent to the chatbot.
     */
    public function help() {
        $topics = CSTopic::all();
        $all_topics = array();
        foreach($topics as $topic) {
            $all_topics[] = $topic->name;
        }
        $string = "";
        for ($idx = 0; $idx < count($all_topics); $idx++) {
            if ($idx == count($all_topics) - 1) {
                $string = $string . " " . $all_topics[$idx] . ".";
            }else {
                $string = $string . " " . $all_topics[$idx] . ",";
            }

        }
        $this->say('I know about the following topics: ' . $string);
        $this->followUp();
    }

    /**
     * stopConversation()
     *
     * This function is called from the goodby() function, so that the
     * conversation can be terminated and no more responses are processed.
     */
    public function stopConversation() {
        return true;
    }

    /**
     * goodbye()
     *
     * This function is called when the chatbot recieves "bye" or "stop".
     * A goodbye message is sent to the user and the stopConversation() function
     * is called.
     */
    public function goodbye() {
        $this->say('Thank you for using this chatbot.');
        $this->stopConversation();
    }

    /**
     * run()
     *
     * This function is the first to be run when the conversation is started.
     * As the conversation is triggered by the word "hello", the user_query
     * variable is set to this and the introduction() function is called,
     * along with the text to be sent.
     */
    public function run() {
        $this->user_query = "hello";
        $this->keyword_api = ChatbotSettings::whereName('keyword_api')->first()->setting;
        $this->introduction("How can I help you?");
    }
}
