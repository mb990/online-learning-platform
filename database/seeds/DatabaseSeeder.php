<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             UsersTableSeeder::class,
             CategoriesTableSeeder::class,
             RolesTableSeeder::class,
             ProfilesTableSeeder::class,
             RoleUserTableSeeder::class,
             CoursesTableSeeder::class,
             ContentsTableSeeder::class,
             CourseUserTableSeeder::class
         ]);
    }
}
