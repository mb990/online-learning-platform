<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 12)->create();

    }
}
