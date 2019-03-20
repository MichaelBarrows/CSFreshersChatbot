<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->truncate();
        DB::table('answers')->insert([
            ['id' => 1, 'text' => "Freshers' week 2018 takes place between Monday 17th September until Friday 21st September.", 'question_id' => 1],
            ['id' => 2, 'text' => "You must attend all compulsory events on your induction timetable", 'question_id' => 2],
            ['id' => 3, 'text' => "If you are going to be absent, you must contact the tutor for that session with the reason for the absence", 'question_id' => 3],
            ['id' => 4, 'text' => "You will receive your semester 1 timetable during freshers' week", 'question_id' => 5],
            ['id' => 5, 'text' => "If your having any problems with your course, you should speak to your personal tutor. You can find out who your personal tutor is on Learning Edge", 'question_id' => 8],
            ['id' => 6, 'text' => "You only need to attend the languages session if you have chosen to study a language module.", 'question_id' => 9],
            ['id' => 7, 'text' => "The best way to contact staff is via email or by visiting their office during office hours.", 'question_id' => 10],
            ['id' => 8, 'text' => "The Edge Link bus runs every 20 minutes, Monday - Friday 7:25AM - 21:25 and Saturday 8:05 - 17:45.", 'question_id' => 11],
            ['id' => 9, 'text' => "Post can be collected from the Durning Centre between 7AM - 7PM Monday to Friday and between 10AM - 2PM on Saturdays during term time.", 'question_id' => 13],
            ['id' => 10, 'text' => "The launderette is open between 7:30AM and 11:30PM.", 'question_id' => 14],
            ['id' => 11, 'text' => "You can pay for laundry using the Circuit Laundry app for Android and iOS or using a laundry card which can be purchased from the SU Shop (next to Subway).", 'question_id' => 15],
            ['id' => 12, 'text' => "McColls is open from 6AM until 11PM everyday.", 'question_id' => 17],
            ['id' => 13, 'text' => "If your neighbours are being noisy, you can contact Campus Support on 01695 584227", 'question_id' => 20],
            ['id' => 14, 'text' => "Professor Nik Bessis is the head of the Department of Computer Science.", 'question_id' => 26],
            ['id' => 15, 'text' => "Dr Mark Liptrott is the director of undergraduate studies", 'question_id' => 27],
            ['id' => 16, 'text' => "Recommended materials for all courses within the department of Computer Science include:", 'question_id' => 47],
            ['id' => 17, 'text' => "Portable Hard Disk Drive (500GB shock proof USB 3 portable self-powered hard disk drive [approx £50])", 'question_id' => 47],
            ['id' => 18, 'text' => "Computer (Not necessary as some facilities are available 24 hours a day, however recommended minimum spec includes 8GB RAM; 750GB HDD; Intel i5 [or equivalent AMD processor]; 15\" screen desirable)", 'question_id' => 47],
        ]);
    }
}
