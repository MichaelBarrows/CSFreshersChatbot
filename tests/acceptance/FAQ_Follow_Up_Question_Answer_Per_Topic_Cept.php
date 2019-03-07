<?php
$I = new AcceptanceTester($scenario);
$I->am('Student');
$I->wantTo("[FAQs] See a follow up question and response when there is more than one possible answer");

$I->haveInDatabase('topics', [
  'id' => 9999,
  'name' => 'Course Information'
]);

$I->haveInDatabase('questions', [
  'id' => 9999,
  'text' => 'Who is the course leader?',
  'topic_id' => 9999
]);

$I->haveInDatabase('follow_up_questions', [
  'id' => 9999,
  'question_id' => 9999,
  'text' => 'For which course?'
]);

$I->haveInDatabase('follow_up_options', [
  'id' => 9999,
  'follow_up_question_id' => 9999,
  'option' => 'Web Design and Development'
]);

$I->haveInDatabase('follow_up_options', [
  'id' => 9998,
  'follow_up_question_id' => 9999,
  'option' => 'Computer Science'
]);

$I->haveInDatabase('follow_up_options', [
  'id' => 9997,
  'follow_up_question_id' => 9999,
  'option' => 'Computing'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9999,
  'follow_up_option_id' => 9999,
  'response' => 'The course leader for Web Design and Development is David Walsh'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9998,
  'follow_up_option_id' => 9998,
  'response' => 'The course leader for Computer Science is Ardhendu Behera'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9997,
  'follow_up_option_id' => 9997,
  'response' => 'The course leader for Computing is Susan Canning'
]);

$I->amOnPage('/');
$I->see('Chatbot');
$I->see("FAQ's");

$I->click("FAQ's");
$I->amOnPage('/faqs/');
$I->see("EHU CS FAQ's");
$I->dontSee("Chatbot");

$I->see('Course Information');
$I->click('Course Information');

$I->amOnPage('/faqs/9999/');
$I->see('Course Information');

$I->see('Who is the course leader?');
$I->click('Who is the course leader?');

$I->see('For which course?');
$I->see('Web Design and Development');
$I->see('Computer Science');
$I->see('Computing');

$I->click('Web Design and Development');
$I->see('The course leader for Web Design and Development is David Walsh');
$I->dontSee('The course leader for Computer Science is Ardhendu Behera');
$I->dontSee('The course leader for Computing is Susan Canning');

$I->click('Computer Science');
$I->see('The course leader for Computer Science is Ardhendu Behera');
$I->dontSee('The course leader for Web Design and Development is David Walsh');
$I->dontSee('The course leader for Computing is Susan Canning');

$I->click('Computing');
$I->see('The course leader for Computing is Susan Canning');
$I->dontSee('The course leader for Web Design and Development is David Walsh');
$I->dontSee('The course leader for Computer Science is Ardhendu Behera');
