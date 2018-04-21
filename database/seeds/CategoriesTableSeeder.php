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
         $category = factory(App\Category::class)->create(['name'=> 'อาหารรองท้อง']);
         $category = factory(App\Category::class)->create(['name'=> 'อาหารจานหลัก']);
         $category = factory(App\Category::class)->create(['name'=> 'เครื่องดื่ม']);
         $category = factory(App\Category::class)->create(['name'=> 'ของหวาน']);
    }
}
