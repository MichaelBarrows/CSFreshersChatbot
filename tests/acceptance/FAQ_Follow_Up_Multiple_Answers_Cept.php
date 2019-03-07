<?php
$I = new AcceptanceTester($scenario);
$I->am('Student');
$I->wantTo("[FAQs] See multiple answers to a question");

$I->haveInDatabase('topics', [
  'id' => 9999,
  'name' => 'Test-Timetable'
]);

$I->haveInDatabase('questions', [
  'id' => 9999,
  'text' => 'Test-What is on my induction timetable?',
  'topic_id' => 9999
]);

$I->haveInDatabase('follow_up_questions', [
  'id' => 9999,
  'question_id' => 9999,
  'text' => 'Test-For which day?'
]);

$I->haveInDatabase('follow_up_options', [
  'id' => 9999,
  'follow_up_question_id' => 9999,
  'option' => 'Test-Monday'
]);

$I->haveInDatabase('follow_up_options', [
  'id' => 9998,
  'follow_up_question_id' => 9999,
  'option' => 'Test-Tuesday'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9999,
  'follow_up_option_id' => 9999,
  'response' => 'Test-On Monday, you have 3 events.'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9998,
  'follow_up_option_id' => 9999,
  'response' => 'Test-12PM - 1PM: Computer Science Department Welcome Talk - Tech Hub Lecture Theatre'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9997,
  'follow_up_option_id' => 9999,
  'response' => 'Test-1PM - 2PM: Learning Services and Library Talk and introduction of Student Mentors - Tech Hub Lecture Theatre'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9996,
  'follow_up_option_id' => 9999,
  'response' => 'Test-2PM - 3PM: Campus and Library Tour - Tech Hub Foyer'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9995,
  'follow_up_option_id' => 9998,
  'response' => 'Test-On Tuesday, you have 7 events.'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9994,
  'follow_up_option_id' => 9998,
  'response' => 'Test-9AM - 11AM: Induction 1 - Processes & Regulations  - Tech Hub Lecture Theatre'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9993,
  'follow_up_option_id' => 9998,
  'response' => 'Test-11AM - 12PM: Careers &amp; Jobs Club  - Tech Hub Lecture Theatre'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9992,
  'follow_up_option_id' => 9998,
  'response' => 'Test-12PM - 1PM: Department Social Event - Pizza Available  - Tech Hub Foyer'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9991,
  'follow_up_option_id' => 9998,
  'response' => 'Test-1PM - 2PM: IT Inductions - THF03/THF04/THF07/THF01'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9990,
  'follow_up_option_id' => 9998,
  'response' => 'Test-2PM - 3PM: Meet Your Personal Tutors - Tech Hub Labs'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9989,
  'follow_up_option_id' => 9998,
  'response' => 'Test-3PM - 3:45PM: Introduction to the Students’ Union and SU Consent Workshop - Tech Hub Lecture Theatre'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9988,
  'follow_up_option_id' => 9998,
  'response' => 'Test-3:45PM - 4:15PM: Student Services - Tech Hub Lecture Theatre'
]);

$I->amOnPage('/');
$I->see('Chatbot');
$I->see("FAQ's");

$I->click("FAQ's");
$I->amOnPage('/faqs/');
$I->see("EHU CS FAQ's");
$I->dontSee("Chatbot");

$I->see('Timetable');
$I->click('Timetable');

$I->amOnPage('/faqs/9999/');
$I->see('Timetable');

$I->see('Test-What is on my induction timetable?');
$I->click('Test-What is on my induction timetable?');

$I->see('Test-For which day?');
$I->see('Test-Monday');
$I->see('Test-Tuesday');

$I->click('Test-Monday');
$I->see('Test-On Monday, you have 3 events.');
$I->see('Test-12PM - 1PM: Computer Science Department Welcome Talk - Tech Hub Lecture Theatre');
$I->see('Test-1PM - 2PM: Learning Services and Library Talk and introduction of Student Mentors - Tech Hub Lecture Theatre');
$I->see('Test-2PM - 3PM: Campus and Library Tour - Tech Hub Foyer');
$I->dontSee('Test-On Tuesday, you have 7 events.');
$I->dontSee('Test-9AM - 11AM: Induction 1 - Processes & Regulations  - Tech Hub Lecture Theatre');
$I->dontSee('Test-11AM - 12PM: Careers &amp; Jobs Club  - Tech Hub Lecture Theatre');
$I->dontSee('Test-12PM - 1PM: Department Social Event - Pizza Available  - Tech Hub Foyer');
$I->dontSee('Test-1PM - 2PM: IT Inductions - THF03/THF04/THF07/THF01');
$I->dontSee('Test-2PM - 3PM: Meet Your Personal Tutors - Tech Hub Labs');
$I->dontSee('Test-3PM - 3:45PM: Introduction to the Students’ Union and SU Consent Workshop - Tech Hub Lecture Theatre');
$I->dontSee('Test-3:45PM - 4:15PM: Student Services - Tech Hub Lecture Theatre');

$I->click('Test-Tuesday');
$I->dontSee('Test-On Monday, you have 3 events.');
$I->dontSee('Test-12PM - 1PM: Computer Science Department Welcome Talk - Tech Hub Lecture Theatre');
$I->dontSee('Test-1PM - 2PM: Learning Services and Library Talk and introduction of Student Mentors - Tech Hub Lecture Theatre');
$I->dontSee('Test-2PM - 3PM: Campus and Library Tour - Tech Hub Foyer');
$I->see('Test-On Tuesday, you have 7 events.');
$I->see('Test-9AM - 11AM: Induction 1 - Processes & Regulations  - Tech Hub Lecture Theatre');
$I->see('Test-11AM - 12PM: Careers &amp; Jobs Club  - Tech Hub Lecture Theatre');
$I->see('Test-12PM - 1PM: Department Social Event - Pizza Available  - Tech Hub Foyer');
$I->see('Test-1PM - 2PM: IT Inductions - THF03/THF04/THF07/THF01');
$I->see('Test-2PM - 3PM: Meet Your Personal Tutors - Tech Hub Labs');
$I->see('Test-3PM - 3:45PM: Introduction to the Students’ Union and SU Consent Workshop - Tech Hub Lecture Theatre');
$I->see('Test-3:45PM - 4:15PM: Student Services - Tech Hub Lecture Theatre');
