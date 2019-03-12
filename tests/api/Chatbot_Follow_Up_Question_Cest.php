<?php

class Chatbot_Follow_Up_Question_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->am('Student');
        $I->wantTo('[Chatbot] Ask a question and receive a follow up question');

        $I->haveInDatabase('topics', [
            'id' => 9999,
            'name' => 'Test-Course Information'
        ]);

        $I->haveInDatabase('questions', [
            'id' => 9999,
            'text' => 'Who is the Test-course Test-leader? test',
            'topic_id' => 9999
        ]);

        $I->haveInDatabase('question_keywords', [
            'id' => 9999,
            'question_id' => 9999,
            'keyword' => 'testcourse'
        ]);

        $I->haveInDatabase('question_keywords', [
            'id' => 9998,
            'question_id' => 9999,
            'keyword' => 'testleader'
        ]);

        $I->haveInDatabase('follow_up_questions', [
            'id' => 9999,
            'question_id' => 9999,
            'text' => 'Test-For which course?'
        ]);

        $I->haveInDatabase('follow_up_options', [
            'id' => 9999,
            'follow_up_question_id' => 9999,
            'option' => 'Test-Web Design and Development'
        ]);

        $I->haveInDatabase('follow_up_options', [
            'id' => 9998,
            'follow_up_question_id' => 9999,
            'option' => 'Test-Computer Science'
        ]);

        $I->haveInDatabase('follow_up_options', [
            'id' => 9997,
            'follow_up_question_id' => 9999,
            'option' => 'Test-Computing'
        ]);

        $I->haveInDatabase('follow_up_responses', [
            'id' => 9999,
            'follow_up_option_id' => 9999,
            'response' => 'Test-The course leader for Web Design and Development is David Walsh'
        ]);

        $I->haveInDatabase('follow_up_responses', [
            'id' => 9998,
            'follow_up_option_id' => 9998,
            'response' => 'Test-The course leader for Computer Science is Ardhendu Behera'
        ]);

        $I->haveInDatabase('follow_up_responses', [
            'id' => 9997,
            'follow_up_option_id' => 9997,
            'response' => 'Test-The course leader for Computing is Susan Canning'
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
        $I->sendPOST('/botman', ['driver' => 'web', 'message' => 'Test-Who is my TestCourse TestLeader?']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'messages' => [
                'type' => 'actions',
                'text' => "Test-For which course?"
            ]
        ]);

        $I->seeResponseContainsJson([
            'messages' => [
                '0' => [
                    'actions' => [
                        'name' => 'Test-Web Design and Development',
                        'text' => "Test-Web Design and Development",
                        'type' => 'button',
                        'value' => '9999'
                    ]
                ]
            ]
        ]);

        $I->seeResponseContainsJson([
            'messages' => [
                '0' => [
                    'actions' => [
                        'name' => 'Test-Computer Science',
                        'text' => "Test-Computer Science",
                        'type' => 'button',
                        'value' => '9998'
                    ]
                ]
            ]
        ]);

        $I->seeResponseContainsJson([
            'messages' => [
                '0' => [
                    'actions' => [
                        'name' => 'Test-Computing',
                        'text' => 'Test-Computing',
                        'type' => 'button',
                        'value' => '9997'
                    ]
                ]
            ]
        ]);
    }
}
