<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

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

        $adminRole = Role::where('name', '=', 'admin')->first();

        User::all()->each(function ($user) use ($roles) {
            $user->roles()->attach($roles->random());
        });

        $admin = new User();
        $admin->first_name = 'Snoop';
        $admin->last_name = 'Dogg';
        $admin->email = 'snoop@gmail.com';
        $admin->password = Hash::make(12345678);

        $admin->save();

        $admin->roles()->attach($adminRole->id);
    }
}
