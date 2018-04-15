<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $category = factory(App\Category::class)->create(['name'=> 'Main course']);
         $category = factory(App\Category::class)->create(['name'=> 'Beverage']);
         $category = factory(App\Category::class)->create(['name'=> 'Dessert']);
    }
}
