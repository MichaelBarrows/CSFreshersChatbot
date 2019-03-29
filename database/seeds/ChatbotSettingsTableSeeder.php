<?php

use Illuminate\Database\Seeder;

class ChatbotSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chatbot_settings')->truncate();
        DB::table('chatbot_settings')->insert([
            ['id' => 1, 'name' => 'keyword_api', "setting" => "true"],
        ]);
    }
}
