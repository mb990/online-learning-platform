<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\Role::class, 3)->create();
        $roles = ['admin', 'educator', 'student'];

        foreach ($roles as $role) {
            $role = new Role();

            $role->name = $roles[0];
            $role->save();

            array_shift($roles);
        }
    }
}
