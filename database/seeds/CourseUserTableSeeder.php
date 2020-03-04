<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\User;

class CourseUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();

        User::all()->each(function ($user) use ($courses) {
            $user->courses()->attach($courses->random((rand(1, 3))));
        });
    }
}
