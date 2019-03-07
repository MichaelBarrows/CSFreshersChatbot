<?php
$I = new AcceptanceTester($scenario);
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
  'keyword' => 'Test-course'
]);

$I->haveInDatabase('question_keywords', [
  'id' => 9998,
  'question_id' => 9999,
  'keyword' => 'Test-leader'
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

$I->fillField('user_text', 'Test-Who is my Test-course Test-leader?');
$I->click('#submit');
$I->see('Test-For which course?');
$I->see('Test-Web Design and Development');
$I->see('Test-Computer Science');
$I->see('Test-Computing');
$I->click('Test-Web Design and Development');
$I->dontSee('Test-Computer Science');
$I->dontSee('Test-Computing');
$I->see('Test-Web Design and Development');
$I->see('Test-The course leader for Web Design and Development is David Walsh');
