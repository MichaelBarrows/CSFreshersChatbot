<?php
$I = new AcceptanceTester($scenario);
$I->am('Student');
$I->wantTo('[Chatbot] Ask a question and receive a response');

$I->haveInDatabase('topics', [
  'id' => 9999,
  'name' => 'Department Information'
]);

$I->haveInDatabase('questions', [
  'id' => 9999,
  'text' => 'Who is the head of the department?',
  'topic_id' => 9999
]);

$I->haveInDatabase('question_keywords', [
  'id' => 9999,
  'question_id' => 9999,
  'keyword' => 'head'
]);

$I->haveInDatabase('question_keywords', [
  'id' => 9998,
  'question_id' => 9999,
  'keyword' => 'department'
]);

$I->haveInDatabase('answers', [
  'id' => 9999,
  'text' => 'The head of the department of Computer Science is Nik Bessis.',
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

$I->fillField('user_text', 'Who is the head of the department');
$I->click('#submit');
$I->see('The head of the department of Computer Science is Nik Bessis.');
