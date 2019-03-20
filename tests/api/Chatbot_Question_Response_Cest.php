<?php

class Chatbot_Question_Response_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->am('Student');
        $I->wantTo('[Chatbot] Ask a question and receive a response');

        $I->haveInDatabase('topics', [
          'id' => 9999,
          'name' => 'Test-Department Information'
        ]);

        $I->haveInDatabase('questions', [
          'id' => 9999,
          'text' => 'Test-Who is the head of the department?',
          'topic_id' => 9999
        ]);

        $I->haveInDatabase('keywords', [
          'id' => 9999,
          'keyword' => 'testhead'
        ]);

        $I->haveInDatabase('keywords', [
          'id' => 9998,
          'keyword' => 'testdepartment'
        ]);

        $I->haveInDatabase('keyword_question', [
          'id' => 9999,
          'question_id' => 9999,
          'keyword_id' => 9999
        ]);

        $I->haveInDatabase('keyword_question', [
          'id' => 9998,
          'question_id' => 9999,
          'keyword_id' => 9998
        ]);

        $I->haveInDatabase('answers', [
          'id' => 9999,
          'text' => 'Test-The head of the department of Computer Science is Nik Bessis.',
          'question_id' => 9999
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

        $I->sendPOST('/botman', ['driver' => 'web', 'message' => 'Who is the TestHead of the TestDepartment']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'messages' => [
                '0' => [
                    'type' => 'text',
                    'text' => "Test-The head of the department of Computer Science is Nik Bessis.",
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
