<?php
$I = new AcceptanceTester($scenario);
$I->am('Student');
$I->wantTo("[FAQs] See a list of topics so that I can choose one");

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

$I->click("FAQ's");
$I->amOnPage('/faqs/');
$I->see("EHU CS FAQ's");
$I->dontSee("Chatbot");

$I->see('Test-Course Information');
$I->see('Test-Department Information');
$I->see('Test-Timetable');
$I->see("Test-Students' Union");
