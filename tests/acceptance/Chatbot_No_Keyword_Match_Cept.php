<?php
$I = new AcceptanceTester($scenario);
$I->am('Student');
$I->wantTo("[Chatbot] See an error message when my query doesn't match any keywords");

$I->haveInDatabase('topics', [
  'id' => 9999,
  'name' => 'Test-System Information'
]);

$I->haveInDatabase('questions', [
  'id' => 9999,
  'text' => 'Test-E01: No Match',
  'topic_id' => 9999
]);

$I->haveInDatabase('question_keywords', [
  'id' => 9999,
  'question_id' => 9999,
  'keyword' => 'Test-E01'
]);

$I->haveInDatabase('answers', [
  'id' => 9999,
  'text' => "Test-Sorry, I don't know about that question. Please ask me something else.",
  'question_id' => 9999
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
$I->seeElement('#user_text');

$I->fillField('user_text', 'Test-Who approved Test-deadline Test-extensions?');
$I->click('#submit');
$I->see("Test-Sorry, I don't know the answer to that question. Please ask me something else.");
