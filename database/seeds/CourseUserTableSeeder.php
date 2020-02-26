<?php

use Illuminate\Database\Seeder;

class CourseUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CourseUser::class, 10)->create();
    }
}
