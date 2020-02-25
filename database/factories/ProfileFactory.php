<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use App\User;
use Faker\Generator as Faker;



$factory->define(Profile::class, function (Faker $faker) {

    $users = User::all()->pluck('id')->toArray();

    return [
        'age' => $faker->randomDigit,
        'image_url' => $faker->url,
        'title' => $faker->jobTitle,
        'biography' => $faker->text,
        'education' => 'University of ' . $faker->city,
        'linkedin' => $faker->url,
        'user_id' => $faker->unique()->randomElement($users)
    ];
});
