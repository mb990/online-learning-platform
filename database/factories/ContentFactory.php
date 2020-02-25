<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Content;
use App\Course;
use Faker\Generator as Faker;

$factory->define(Content::class, function (Faker $faker) {

    $courses = Course::all()->pluck('id')->toArray();

    return [
        'description' => $faker->text,
        'course_id' => $faker->randomElement($courses)
    ];
});
