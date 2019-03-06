<?php
$I = new AcceptanceTester($scenario);
$I->am('Student');
$I->wantTo("[FAQs] See a list of topics so that I can choose one");

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

$I->click("FAQ's");
$I->amOnPage('/faqs/');
$I->see("EHU CS FAQ's");
$I->dontSee("Chatbot");

$I->see('Course Information');
$I->see('Department Information');
$I->see('Timetable');
$I->see("Students' Union");
