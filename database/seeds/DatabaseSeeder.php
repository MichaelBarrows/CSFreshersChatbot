<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		    Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $this->call(TopicsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        $this->call(FollowUpQuestionsTableSeeder::class);
        $this->call(FollowUpOptionsTableSeeder::class);
        $this->call(FollowUpResponsesTableSeeder::class);
        $this->call(ChatbotSettingsTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        Model::reguard();
    }
}
