<?php
$I = new AcceptanceTester($scenario);
$I->am('Student');
$I->wantTo("[FAQs] See multiple answers to a question");

$I->haveInDatabase('topics', [
  'id' => 9999,
  'name' => 'Timetable'
]);

$I->haveInDatabase('questions', [
  'id' => 9999,
  'text' => 'What is on my induction timetable?',
  'topic_id' => 9999
]);

$I->haveInDatabase('follow_up_questions', [
  'id' => 9999,
  'question_id' => 9999,
  'text' => 'For which day?'
]);

$I->haveInDatabase('follow_up_options', [
  'id' => 9999,
  'follow_up_question_id' => 9999,
  'option' => 'Monday'
]);

$I->haveInDatabase('follow_up_options', [
  'id' => 9998,
  'follow_up_question_id' => 9999,
  'option' => 'Tuesday'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9999,
  'follow_up_option_id' => 9999,
  'response' => 'On Monday, you have 3 events.'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9998,
  'follow_up_option_id' => 9999,
  'response' => '12PM - 1PM: Computer Science Department Welcome Talk - Tech Hub Lecture Theatre'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9997,
  'follow_up_option_id' => 9999,
  'response' => '1PM - 2PM: Learning Services and Library Talk and introduction of Student Mentors - Tech Hub Lecture Theatre'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9996,
  'follow_up_option_id' => 9999,
  'response' => '2PM - 3PM: Campus and Library Tour - Tech Hub Foyer'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9995,
  'follow_up_option_id' => 9998,
  'response' => 'On Tuesday, you have 7 events.'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9994,
  'follow_up_option_id' => 9998,
  'response' => '9AM - 11AM: Induction 1 - Processes & Regulations  - Tech Hub Lecture Theatre'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9993,
  'follow_up_option_id' => 9998,
  'response' => '11AM - 12PM: Careers &amp; Jobs Club  - Tech Hub Lecture Theatre'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9992,
  'follow_up_option_id' => 9998,
  'response' => '12PM - 1PM: Department Social Event - Pizza Available  - Tech Hub Foyer'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9991,
  'follow_up_option_id' => 9998,
  'response' => '1PM - 2PM: IT Inductions - THF03/THF04/THF07/THF01'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9990,
  'follow_up_option_id' => 9998,
  'response' => '2PM - 3PM: Meet Your Personal Tutors - Tech Hub Labs'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9989,
  'follow_up_option_id' => 9998,
  'response' => '3PM - 3:45PM: Introduction to the Students’ Union and SU Consent Workshop - Tech Hub Lecture Theatre'
]);

$I->haveInDatabase('follow_up_responses', [
  'id' => 9988,
  'follow_up_option_id' => 9998,
  'response' => '3:45PM - 4:15PM: Student Services - Tech Hub Lecture Theatre'
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

$I->see('What is on my induction timetable?');
$I->click('What is on my induction timetable?');

$I->see('For which day?');
$I->see('Monday');
$I->see('Tuesday');

$I->click('Monday');
$I->see('On Monday, you have 3 events.');
$I->see('12PM - 1PM: Computer Science Department Welcome Talk - Tech Hub Lecture Theatre');
$I->see('1PM - 2PM: Learning Services and Library Talk and introduction of Student Mentors - Tech Hub Lecture Theatre');
$I->see('2PM - 3PM: Campus and Library Tour - Tech Hub Foyer');
$I->dontSee('On Tuesday, you have 7 events.');
$I->dontSee('9AM - 11AM: Induction 1 - Processes & Regulations  - Tech Hub Lecture Theatre');
$I->dontSee('11AM - 12PM: Careers &amp; Jobs Club  - Tech Hub Lecture Theatre');
$I->dontSee('12PM - 1PM: Department Social Event - Pizza Available  - Tech Hub Foyer');
$I->dontSee('1PM - 2PM: IT Inductions - THF03/THF04/THF07/THF01');
$I->dontSee('2PM - 3PM: Meet Your Personal Tutors - Tech Hub Labs');
$I->dontSee('3PM - 3:45PM: Introduction to the Students’ Union and SU Consent Workshop - Tech Hub Lecture Theatre');
$I->dontSee('3:45PM - 4:15PM: Student Services - Tech Hub Lecture Theatre');

$I->click('Tuesday');
$I->dontSee('On Monday, you have 3 events.');
$I->dontSee('12PM - 1PM: Computer Science Department Welcome Talk - Tech Hub Lecture Theatre');
$I->dontSee('1PM - 2PM: Learning Services and Library Talk and introduction of Student Mentors - Tech Hub Lecture Theatre');
$I->dontSee('2PM - 3PM: Campus and Library Tour - Tech Hub Foyer');
$I->see('On Tuesday, you have 7 events.');
$I->see('9AM - 11AM: Induction 1 - Processes & Regulations  - Tech Hub Lecture Theatre');
$I->see('11AM - 12PM: Careers &amp; Jobs Club  - Tech Hub Lecture Theatre');
$I->see('12PM - 1PM: Department Social Event - Pizza Available  - Tech Hub Foyer');
$I->see('1PM - 2PM: IT Inductions - THF03/THF04/THF07/THF01');
$I->see('2PM - 3PM: Meet Your Personal Tutors - Tech Hub Labs');
$I->see('3PM - 3:45PM: Introduction to the Students’ Union and SU Consent Workshop - Tech Hub Lecture Theatre');
$I->see('3:45PM - 4:15PM: Student Services - Tech Hub Lecture Theatre');
