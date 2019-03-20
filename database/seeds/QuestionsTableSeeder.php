<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->truncate();
        DB::table('questions')->insert([
            ['id' => 1, 'text' => "When is freshers week?", "topic_id" => 1],
            ['id' => 2, 'text' => "Do I have to attend every event on my induction timetable?", "topic_id" => 1],
            ['id' => 3, 'text' => "Who do I contact if I'm going to be absent?", "topic_id" => 2],
            ['id' => 4, 'text' => "What's on my timetable for freshers week?", "topic_id" => 1],
            ['id' => 5, 'text' => "When can I access my timetable for semester 1?", "topic_id" => 2],
            ['id' => 6, 'text' => "Can I download my induction timetable?", "topic_id" => 1],
            ['id' => 7, 'text' => "Who is my course leader?", "topic_id" => 2],
            ['id' => 8, 'text' => "Who can I talk to if I'm not enjoying my course?", "topic_id" => 2],
            ['id' => 9, 'text' => "Do I need to attend the languages session?", "topic_id" => 1],
            ['id' => 10, 'text' => "How can I contact staff", "topic_id" => 3],
            ['id' => 11, 'text' => "How often does the Edge Link bus run?", "topic_id" => 4],
            ['id' => 12, 'text' => "Edge Link timetable", "topic_id" => 4],
            ['id' => 13, 'text' => "Where do I collect my post?", "topic_id" => 4],
            ['id' => 14, 'text' => "What time does the launderette open and close?", "topic_id" => 4],
            ['id' => 15, 'text' => "How can I pay to do my laundry?", "topic_id" => 4],
            ['id' => 16, 'text' => "How can I download the app for laundry?", "topic_id" => 4],
            ['id' => 17, 'text' => "What time does McColls open and close?", "topic_id" => 4],
            ['id' => 18, 'text' => "I'm having trouble connecting to eduroam, who do I contact?", "topic_id" => 4],
            ['id' => 19, 'text' => "How can I get a council tax exemption certificate?", "topic_id" => 4],
            ['id' => 20, 'text' => "Who do I contact about loud neighbours/excessive noise", "topic_id" => 4],
            ['id' => 21, 'text' => "How do I apply for a parking permit?", "topic_id" => 4],
            ['id' => 22, 'text' => "Are there any societies I can join?", "topic_id" => 5],
            ['id' => 23, 'text' => "What time does the students union bar (SU) open and close?", "topic_id" => 5],
            ['id' => 24, 'text' => "What events are the students union (SU) running?", "topic_id" => 5],
            ['id' => 25, 'text' => "Where can I get something to eat on campus?", "topic_id" => 4],
            ['id' => 26, 'text' => "Who is the head of the department?", "topic_id" => 3],
            ['id' => 27, 'text' => "Who is the director of undergraduate studies?", "topic_id" => 3],
            ['id' => 28, 'text' => "What facilities does the department provide", "topic_id" => 3],
            ['id' => 29, 'text' => "How can I access my email account?", "topic_id" => 4],
            ['id' => 30, 'text' => "How can I access university services?", "topic_id" => 4],
            ['id' => 31, 'text' => "How can I access Blackboard/Learning Edge?", "topic_id" => 4],
            ['id' => 32, 'text' => "Something in my room is broken, how do I get it repaired?", "topic_id" => 4],
            ['id' => 33, 'text' => "How can I connect my PlayStation (PS) or XBOX to the internet?", "topic_id" => 4],
            ['id' => 34, 'text' => "How can I find out if a book is available in the library?", "topic_id" => 4],
            ['id' => 35, 'text' => "How can I check computer availability in the Catalyst", "topic_id" => 4],
            ['id' => 36, 'text' => "How can I contact Learning Services?", "topic_id" => 4],
            ['id' => 37, 'text' => "I'm struggling with money, who can I talk to?", "topic_id" => 4],
            ['id' => 38, 'text' => "Does the university provide Microsoft Office?", "topic_id" => 4],
            ['id' => 39, 'text' => "How can I reset my password?", "topic_id" => 4],
            ['id' => 40, 'text' => "How does referencing work?", "topic_id" => 2],
            ['id' => 41, 'text' => "How do I register to vote?", "topic_id" => 4],
            ['id' => 42, 'text' => "How can I book an individual or group study room in the library?", "topic_id" => 4],
            ['id' => 43, 'text' => "Who can I talk to if I want to change course or leave the university?", "topic_id" => 2],
            ['id' => 44, 'text' => "Will I get a bursary or scholarship?", "topic_id" => 4],
            ['id' => 45, 'text' => "Can I join a sports team?", "topic_id" => 4],
            ['id' => 46, 'text' => "Which modules will I be studying this year?", "topic_id" => 2],
            ['id' => 47, 'text' => "Is there anything I should buy/do before the course starts?", "topic_id" => 2],
            ['id' => 48, 'text' => "Who is my personal tutor?", "topic_id" => 3],
        ]);
    }
}
