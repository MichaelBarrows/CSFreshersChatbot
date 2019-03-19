<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TopicsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        // $this->call(KeywordsTableSeeder::class);
        // $this->call(QuestionKeywordsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        $this->call(FollowUpQuestionsTableSeeder::class);
        $this->call(FollowUpOptionsTableSeeder::class);
        $this->call(FollowUpResponsesTableSeeder::class);
    }
}
