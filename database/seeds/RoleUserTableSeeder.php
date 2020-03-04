<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = Role::whereIn('name', ['student', 'educator'])->inRandomOrder()->limit(2)->get();

        User::all()->each(function ($user) use ($roles) {
            $user->roles()->attach($roles->random());
        });
    }
}
