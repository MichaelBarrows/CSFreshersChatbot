<?php
$I = new AcceptanceTester($scenario);
$I->am('Student');
$I->wantTo("[FAQs] See an answer to a question when there is no follow up option");

$I->haveInDatabase('topics', [
  'id' => 9999,
  'name' => 'Test-Course Information'
]);

$I->haveInDatabase('questions', [
  'id' => 9999,
  'text' => 'Test-Who is the head of the department?',
  'topic_id' => 9999
]);

$I->haveInDatabase('questions', [
  'id' => 9998,
  'text' => 'Test-Who is the director of undergraduate studies?',
  'topic_id' => 9999
]);

$I->haveInDatabase('answers', [
  'id' => 9999,
  'text' => 'Test-The head of the department of Computer Science is Nik Bessis.',
  'question_id' => 9999
]);

$I->haveInDatabase('answers', [
  'id' => 9998,
  'text' => 'Test-The director of undergraduate studies is Mark Liptrott.',
  'question_id' => 9998
]);

$I->amOnPage('/');
$I->see('Chatbot');
$I->see("FAQ's");

$I->click("FAQ's");
$I->amOnPage('/faqs/');
$I->see("EHU CS FAQ's");
$I->dontSee("Chatbot");

$I->see('Test-Course Information');
$I->click('Test-Course Information');

$I->amOnPage('/faqs/9999/');
$I->see('Test-Course Information');

$I->see('Test-Who is the head of the department?');
$I->dontSee('Test-The head of the department of Computer Science is Nik Bessis.');

$I->see('Test-Who is the director of undergraduate studies?');
$I->dontSee('Test-The director of undergraduate studies is Mark Liptrott.');

$I->click('Test-Who is the head of the department?');
$I->see('Test-The head of the department of Computer Science is Nik Bessis.');

$I->click('Test-Who is the director of undergraduate studies?');
$I->see('Test-The director of undergraduate studies is Mark Liptrott.');
$I->dontSee('Test-The head of the department of Computer Science is Nik Bessis.');
