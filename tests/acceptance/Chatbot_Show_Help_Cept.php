<?php
$I = new AcceptanceTester($scenario);
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

$I->amOnPage('/');
$I->see('Chatbot');
$I->see("FAQ's");

$I->click('Chatbot');
$I->amOnPage('/chat/');
$I->see('EHU CS Chatbot');
$I->see('?');
$I->dontSee("FAQ's");

$I->see("Hello, this is a chatbot for students of Edge Hill University's Department of Computer Science.");
$I->see('How can I help you?');
$I->click('?');

$I->see('Test-Course Information');
$I->see('Test-Department Information');
$I->see('Test-Timetable');
$I->see("Test-Students' Union");
