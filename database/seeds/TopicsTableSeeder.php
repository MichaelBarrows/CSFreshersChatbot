<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('topics')->truncate();
        DB::table('topics')->insert([
            ['id' => 1, 'name' => "Induction Week"],
            ['id' => 2, 'name' => "Course Information"],
            ['id' => 3, 'name' => "Department Information"],
            ['id' => 4, 'name' => "University Information"],
            ['id' => 5, 'name' => "Students' Union"],
        ]);
    }
}
