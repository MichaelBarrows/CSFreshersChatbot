<?php
$I = new AcceptanceTester($scenario);
$I->am('Student');
$I->wantTo("[FAQs] See a list of questions related to the chosen topic");

$I->haveInDatabase('topics', [
  'id' => 9999,
  'name' => 'Department Information'
]);

$I->haveInDatabase('questions', [
  'id' => 9999,
  'text' => 'Who is the head of the department?',
  'topic_id' => 9999
]);

$I->haveInDatabase('questions', [
  'id' => 9998,
  'text' => 'Who is the director of undergraduate studies?',
  'topic_id' => 9999
]);

$I->haveInDatabase('answers', [
  'id' => 9999,
<<<<<<< HEAD
  'text' => 'The head of the department of Computer Science is Nik Bessis.',
=======
  'text' => 'The head of the department of Computer Science is Prof. Nik Bessis.',
>>>>>>> 7e77a3effa2f5bda952ed27cff2511e39808803d
  'question_id' => 9999
]);

$I->haveInDatabase('answers', [
  'id' => 9998,
<<<<<<< HEAD
  'text' => 'The director of undergraduate studies is Mark Liptrott.',
=======
  'text' => 'The director of undergraduate studies is Dr. Mark Liptrott.',
>>>>>>> 7e77a3effa2f5bda952ed27cff2511e39808803d
  'question_id' => 9998
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

$I->see('Who is the head of the department?');
$I->dontSee('The head of the department of Computer Science is Prof. Nik Bessis.');

$I->see('Who is the director of undergraduate studies?');
$I->dontSee('The director of undergraduate studies is Dr. Mark Liptrott.');
