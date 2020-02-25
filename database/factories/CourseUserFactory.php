<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CourseUser;
use App\Course;
use App\User;
use Faker\Generator as Faker;

$factory->define(CourseUser::class, function (Faker $faker) {

    $courses = Course::all()->pluck('id')->toArray();
    $users = User::all()->pluck('id')->toArray();

    return [
        'course_id' => $faker->randomElement($courses),
        'user_id' => $faker->randomElement($users)
    ];
});
