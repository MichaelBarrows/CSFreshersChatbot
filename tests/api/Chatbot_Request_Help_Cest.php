<?php

class Chatbot_Request_Help_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->am('Student');
        $I->wantTo('[Chatbot] Recieve a list of topics when I click help');

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

        $I->sendPOST('/botman', ['driver' => 'web', 'message' => 'help']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'type' => 'text',
            'text' => "I know about the following topics:  Freshers' Week, Course Information, Department Information, University Information, Students' Union, Student Services, Facilities Management, IT Services, Campus Support, Library."
        ]);

        $I->seeResponseContainsJson([
            'type' => 'text',
            'text' => "Is there anything else I can help you with?"
        ]);
    }
}
