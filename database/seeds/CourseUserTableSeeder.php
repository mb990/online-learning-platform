<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class CourseUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker = Faker::create();
//
//        $course_id = Course::pluck('id')->all();
//        $user_id = User::pluck('id')->all();
//
//        DB::table('course_user')->insert([
//            'course_id' => $faker->randomElement($course_id),
//            'user_id' => $faker->randomElement($user_id)
//        ]);

//        $timestamp = date('Y-m-d H:i:s');
//
//        for ($i = 0; $i < 10; $i++) {
//
//            DB::table('course_user')->insert(
//                [
//                    'course_id' => Course::select('id')->orderByRaw("RAND()")->first()->id,
//                    'user_id' => User::select('id')->orderByRaw("RAND()")->first()->id,
//                    'created_at' => $timestamp,
//                    'updated_at' => $timestamp
//                ]
//            );
//        }

        $courseIds      = DB::table('courses')->pluck('id')->toArray();
        $userIds      = DB::table('users')->pluck('id')->toArray();
        $timestamp = date('Y-m-d H:i:s');

        //Seed user_role table with 10 entries
        foreach ((range(1, 10)) as $index)
        {
            DB::table('course_user')->insert(
                [
                    'course_id' => $courseIds[array_rand($courseIds)],
                    'user_id' => $userIds[array_rand($userIds)],
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp
                ]
            );
        }
    }
}
