<?php

class Chatbot_No_Answer_or_Follow_Up_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->am('Student');
        $I->wantTo("[Chatbot] See an error message when my query doesn't have a response");

        $I->haveInDatabase('topics', [
            'id' => 9999,
            'name' => 'Test-Course Information'
        ]);

        $I->haveInDatabase('topics', [
            'id' => 9998,
            'name' => 'Test-System Information'
        ]);

        $I->haveInDatabase('questions', [
            'id' => 9999,
            'text' => 'Test-Who approves coursework Test-extensions',
            'topic_id' => 9999
        ]);

        $I->haveInDatabase('questions', [
            'id' => 9998,
            'text' => 'Test-E02: No Response',
            'topic_id' => 9998
        ]);

        $I->haveInDatabase('keywords', [
            'id' => 9999,
            'keyword' => 'testextension'
        ]);

        $I->haveInDatabase('keywords', [
            'id' => 9998,
            'keyword' => 'testdeadline'
        ]);

        $I->haveInDatabase('keywords', [
            'id' => 9997,
            'keyword' => 'test-e02'
        ]);

        $I->haveInDatabase('keyword_question', [
            'id' => 9999,
            'question_id' => 9999,
            'keyword_id' => 9999
        ]);

        $I->haveInDatabase('keyword_question', [
            'id' => 9998,
            'question_id' => 9999,
            'keyword_id' => 9999
        ]);

        $I->haveInDatabase('keyword_question', [
            'id' => 9997,
            'question_id' => 9998,
            'keyword_id' => 9997
        ]);

        $I->haveInDatabase('answers', [
            'id' => 9998,
            'text' => "Sorry, I don't know about that question. Please ask me something else.",
            'question_id' => 9998
        ]);

        $I->sendPOST('/botman', ['driver' => 'web', 'message' => 'hello']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'messages' => [
                '0' => [
                    'type' => 'text',
                    'text' => 'How can I help you?',
                ]
            ]
        ]);
        $I->sendPOST('/botman', ['driver' => 'web', 'message' => 'dknlhgbn odfm gdknldf']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'messages' => [
                '0' => [
                    'type' => 'text',
                    'text' => "Sorry, I don't know about that question. Please ask me something else.",
                ]
            ]
        ]);
        $I->seeResponseContainsJson([
            'messages' => [
                '1' => [
                    'type' => 'text',
                    'text' => "Is there anything else I can help you with?"
                ]
            ]
        ]);
    }
}
