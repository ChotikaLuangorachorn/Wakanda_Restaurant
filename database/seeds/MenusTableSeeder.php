<?php

use Illuminate\Database\Seeder;
use App\Menu as Menu;
class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Appetizer category_id = 1
        factory(Menu::class)->create([
            'name' => 'French fried',
            'price' => 95.0,
            'image_path' => '',
            'category_id' => 1,
        ]);        
    	//Main course category_id = 2
        factory(Menu::class)->create([
        	'name' => 'Fried rice',
        	'price' => 50.0,
        	'image_path' => '',
        	'category_id' => 2,
    	]);

    	//Beverage category_id = 3
    	factory(Menu::class)->create([
        	'name' => 'Water',
        	'price' => 10.0,
        	'image_path' => '',
        	'category_id' => 3,
    	]);

    	//Dessert category_id = 4
    	factory(Menu::class)->create([
        	'name' => 'Ice cream',
        	'price' => 25.0,
        	'image_path' => '',
        	'category_id' => 4,
    	]);
    }
}
