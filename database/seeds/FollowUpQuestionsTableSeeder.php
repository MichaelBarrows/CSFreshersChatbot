<?php

use Illuminate\Database\Seeder;

class FollowUpQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follow_up_questions')->insert([
            ['id' => 1, 'question_id' => 4, 'text' => "For which day?"],
            ['id' => 2, 'question_id' => 6, 'text' => "You can download your induction timetable by selecting your course below"],
            ['id' => 3, 'question_id' => 7, 'text' => "For which Course?"],
            ['id' => 4, 'question_id' => 12, 'text' => "The Edge Link timetable is available below:"],
            ['id' => 5, 'question_id' => 16, 'text' => "The Circuit Laundry app can be downloaded using the links below:"],
            ['id' => 6, 'question_id' => 18, 'text' => "You can connect to eduroam using your Edge Hill username and password. For more information, click the link below."],
            ['id' => 7, 'question_id' => 19, 'text' => "You can get a council tax exemption certificate by clicking the link below."],
            ['id' => 8, 'question_id' => 21, 'text' => "To apply for a parking permit, please click the link below."],
            ['id' => 9, 'question_id' => 22, 'text' => "Edge Hill Students' Union offer a variety of societies that you can join. Click the link below to see a list of all societies."],
            ['id' => 10, 'question_id' => 23, 'text' => "The SU Bar's opening times are available on their Facebook page below."],
            ['id' => 11, 'question_id' => 24, 'text' => "On which day?"],
            ['id' => 12, 'question_id' => 25, 'text' => "There are a variety of places to eat on campus:"],
            ['id' => 13, 'question_id' => 28, 'text' => "You can find out more about the departments facilities by clicking the link below."],
            ['id' => 14, 'question_id' => 29, 'text' => "You can access your university email account by clicking the link below."],
            ['id' => 15, 'question_id' => 30, 'text' => "The easiest way to access university services is using the Students' homepage."],
            ['id' => 16, 'question_id' => 31, 'text' => "You can access Learning Edge by clicking the link below."],
            ['id' => 17, 'question_id' => 32, 'text' => "You can report a repair using the link below."],
            ['id' => 18, 'question_id' => 33, 'text' => "A detailed guide for connecting your console to the Edge Hill network is available below."],
            ['id' => 19, 'question_id' => 34, 'text' => "You can search for books and check their availability using the link below."],
            ['id' => 20, 'question_id' => 35, 'text' => "You can check computer availability in the Catalyst using the link below."],
            ['id' => 21, 'question_id' => 36, 'text' => "You can contact Learning services by telephone on 01695 650800 between 8AM and 8PM Monday to Friday or between 10AM and 6PM on the weekend. Click the link below to live chat."],
            ['id' => 22, 'question_id' => 37, 'text' => "If you are worried about money, you can contact the Money Advice Team by dropping in to the Catalyst building between 10AM and 1PM on Monday or Friday, or between 1PM and 4PM on Tuesday or Thursday. You can also telephone them on 01695 650800 or email using the link below."],
            ['id' => 23, 'question_id' => 38, 'text' => "The university provides Microsoft Office for you to use during your studies, click the link below to find out more."],
            ['id' => 24, 'question_id' => 39, 'text' => "You can reset your Edge Hill password by clicking the link below."],
            ['id' => 25, 'question_id' => 40, 'text' => "Unless you have been told otherwise, Edge Hill uses the Harvard referencing format. The Edge Hill Harvard referencing guide is available from the link below."],
            ['id' => 26, 'question_id' => 41, 'text' => "You can register to vote at both your permanent home and term time addresses, click the link below to get started."],
            ['id' => 27, 'question_id' => 42, 'text' => "Study rooms in the Catalyst building can be booked using the link below"],
            ['id' => 28, 'question_id' => 43, 'text' => "If you are considering changing courses or leaving the university, you should look at the information in the links below."],
            ['id' => 29, 'question_id' => 44, 'text' => "You may get a Scholarship or Bursary if you meet the elegibility criteria. You will be notified if you are elegible. Use the link below to access the scholarship calculator."],
            ['id' => 30, 'question_id' => 45, 'text' => "Edge Hill has a number of sports teams you can join, click the link below to find out more, or visit the stands at the Welcome Fair."],
            ['id' => 31, 'question_id' => 46, 'text' => "To find out which modules you will be studying this year, select your course below."],
            ['id' => 32, 'question_id' => 48, 'text' => "You can find out who your personal tutor is in the organisations section of Learning Edge"],
        ]);
    }
}
