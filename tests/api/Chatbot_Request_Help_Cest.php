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

        $I->haveInDatabase('topics', [
            'id' => 9999,
            'name' => 'Test-Course Information'
        ]);

        $I->haveInDatabase('topics', [
            'id' => 9998,
            'name' => 'Test-Department Information'
        ]);

        $I->haveInDatabase('topics', [
            'id' => 9997,
            'name' => 'Test-Timetable'
        ]);

        $I->haveInDatabase('topics', [
            'id' => 9996,
            'name' => "Test-Students' Union"
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

        $I->sendPOST('/botman', ['driver' => 'web', 'message' => 'help']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'type' => 'text',
            'text' => 'I know about the following topics:'
        ]);

        $I->seeResponseContainsJson([
            'type' => 'text',
            'text' => 'Test-Course Information'
        ]);

        $I->seeResponseContainsJson([
            'type' => 'text',
            'text' => 'Test-Department Information'
        ]);

        $I->seeResponseContainsJson([
            'type' => 'text',
            'text' => 'Test-Timetable'
        ]);

        $I->seeResponseContainsJson([
            'type' => 'text',
            'text' => "Test-Students' Union"
        ]);

        $I->seeResponseContainsJson([
            'type' => 'text',
            'text' => "Is there anything else I can help you with?"
        ]);
    }
}
