<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use App\User;
use Faker\Generator as Faker;



$factory->define(Profile::class, function (Faker $faker) {

    $users = User::all()->pluck('id')->toArray();

    return [
        'age' => $faker->randomDigitNotNull,
        'image_url' => $faker->imageUrl(),
        'title' => $faker->jobTitle,
        'biography' => $faker->realText(200),
        'education' => 'University of ' . $faker->city,
        'linkedin' => $faker->url,
        'user_id' => $faker->unique()->randomElement($users)
    ];
});
