<?php
$I = new AcceptanceTester($scenario);
$I->am('Student');
$I->wantTo('[Chatbot] Recieve a list of topics when I click help');

$I->haveInDatabase('topics', [
  'id' => 9999,
  'name' => 'Course Information'
]);

$I->haveInDatabase('topics', [
  'id' => 9998,
  'name' => 'Department Information'
]);

$I->haveInDatabase('topics', [
  'id' => 9997,
  'name' => 'Timetable'
]);

$I->haveInDatabase('topics', [
  'id' => 9996,
  'name' => "Students' Union"
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

$I->see('Course Information');
$I->see('Department Information');
$I->see('Timetable');
$I->see("Students' Union");
