<?php
$I = new AcceptanceTester($scenario);
$I->am('Student');
$I->wantTo("[FAQs] See a follow up question and response when there is more than one possible answer");

$I->haveInDatabase('topics', [
  'id' => 9999,
  'name' => 'Test-Course Information'
]);

$I->haveInDatabase('questions', [
  'id' => 9999,
  'text' => 'Test-Who is the course leader?',
  'topic_id' => 9999
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

$I->click("FAQ's");
$I->amOnPage('/faqs/');
$I->see("EHU CS FAQ's");
$I->dontSee("Chatbot");

$I->see('Test-Course Information');
$I->click('Test-Course Information');

$I->amOnPage('/faqs/9999/');
$I->see('Test-Course Information');

$I->see('Test-Who is the course leader?');
$I->click('Test-Who is the course leader?');

$I->see('Test-For which course?');
$I->see('Test-Web Design and Development');
$I->see('Test-Computer Science');
$I->see('Test-Computing');

$I->click('Test-Web Design and Development');
$I->see('Test-The course leader for Web Design and Development is David Walsh');
$I->dontSee('Test-The course leader for Computer Science is Ardhendu Behera');
$I->dontSee('Test-The course leader for Computing is Susan Canning');

$I->click('Test-Computer Science');
$I->see('Test-The course leader for Computer Science is Ardhendu Behera');
$I->dontSee('Test-The course leader for Web Design and Development is David Walsh');
$I->dontSee('Test-The course leader for Computing is Susan Canning');

$I->click('Test-Computing');
$I->see('Test-The course leader for Computing is Susan Canning');
$I->dontSee('Test-The course leader for Web Design and Development is David Walsh');
$I->dontSee('Test-The course leader for Computer Science is Ardhendu Behera');
