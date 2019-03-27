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
            ['id' => 1, 'name' => "Freshers' Week"],
            ['id' => 2, 'name' => "Course Information"],
            ['id' => 3, 'name' => "Department Information"],
            ['id' => 4, 'name' => "University Information"],
            ['id' => 5, 'name' => "Students' Union"],
            ['id' => 6, 'name' => "Student Services"],
            ['id' => 7, 'name' => "Facilities Management"],
            ['id' => 8, 'name' => "IT Services"],
            ['id' => 9, 'name' => "Campus Support"],
            ['id' => 10, 'name' => "Library"],
        ]);
    }
}
