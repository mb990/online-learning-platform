<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\Category::class, 5)->create();

        $categories = ['php', 'java', 'javascript', 'python', 'ruby'];

        foreach ($categories as $category) {
            $category = new Category();

            $category->name = $categories[0];
            $category->save();

            array_shift($categories);
        }
    }
}
