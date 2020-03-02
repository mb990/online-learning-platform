<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class RoleUserTableSeeder extends Seeder

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
//        $role_id = Role::pluck('id')->all();
//        $user_id = User::pluck('id')->all();
//
//        DB::table('role_user')->insert([
//            'role_id' => $faker->randomElement($role_id),
//            'user_id' => $faker->randomElement($user_id)
//        ]);

//        $timestamp = date('Y-m-d H:i:s');
//
//        for ($i = 0; $i < 10; $i++) {
//
//            DB::table('role_user')->insert(
//                [
//                    'role_id' => Role::select('id')->orderByRaw("RAND()")->first()->id,
//                    'user_id' => User::select('id')->orderByRaw("RAND()")->first()->id,
//                    'created_at' => $timestamp,
//                    'updated_at' => $timestamp
//                ]
//            );
//        }

        $userIds      = DB::table('users')->pluck('id')->toArray();
        $roleIds      = DB::table('roles')->pluck('id')->toArray();
        $timestamp = date('Y-m-d H:i:s');

        //Seed user_role table with 10 entries
        foreach ((range(1, 10)) as $index)
        {
            DB::table('role_user')->insert(
                [
                    'role_id' => $roleIds[array_rand($roleIds)],
                    'user_id' => $userIds[array_rand($userIds)],
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp
                ]
            );
        }
    }
}
