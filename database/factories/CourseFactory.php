<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use App\Category;
use App\User;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {

    $categories = Category::all()->pluck('id')->toArray();

    $owners = User::whereHas('roles', function($q){
        $q->whereIn('name', ['educator']);
        })
        ->get();

//    $owners = User::all();


    return [
        'name' => $faker->realText(10),
        'description' => $faker->realText(200),
        'goals' => $faker->text($maxNbChars = 10),
        'video_url' => $faker->url,
        'category_id' => $faker->randomElement($categories),
        'user_id' => $faker->randomElement($owners),
        'image_url' => $faker->imageUrl()
    ];
});
