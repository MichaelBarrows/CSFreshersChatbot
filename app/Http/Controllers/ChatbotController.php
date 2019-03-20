<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keyword;
use App\Question;
use App\ChatbotSettings;
use GuzzleHttp\Client;

class ChatbotController extends Controller
{
    /**
     * index()
     *
     * This function creates the keywords and relationships between the
     * keywords and questions when the /chat/ page is loaded.
     * The keywords are identified using the keywords API.
     * Only questions without keywords are executed through the keywords API
     * Once this is completed, the chatbot interface is returned to the user.
     */
    public function index() {
        $keyword_api = ChatbotSettings::whereName('keyword_api')->first();
        if ($keyword_api->setting == "true") {
            $client = new Client(['base_uri' => 'http://localhost:5000']);
            foreach(Question::all() as $question) {
                if (!$question->keywords()->exists()) {
                    $api_response = $client->request('POST', '/?query=' . $question->text);
                    $response = json_decode($api_response->getBody());
                    $keywords = preg_split("/[\s,-?!]+/", $response->response);
                    foreach($keywords as $keyword) {
                        $db_keyword = Keyword::where('keyword', '=', $keyword)->get();
                        if (count($db_keyword) == 0) {
                            $db_keyword = Keyword::create(['keyword' => $keyword])->id;
                        } else {
                            $db_keyword = Keyword::where('keyword', '=', $keyword)->first()->id;
                        }
                        $question->keywords()->attach($db_keyword);
                    }
                }
            }
        }
        return view('chatbot.home');
    }
}
