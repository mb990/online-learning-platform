<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {

    $categories = Category::all()->pluck('id')->toArray();


    return [
        'name' => $faker->title,
        'description' => $faker->text,
        'goals' => $faker->text($maxNbChars = 10),
        'video_url' => $faker->url,
        'category_id' => $faker->randomElement($categories)
    ];
});
