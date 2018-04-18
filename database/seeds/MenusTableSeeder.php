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
            'name' => 'มันฝรั่งทอด',
            'price' => 95.0,
            'image_path' => '',
            'category_id' => 1,
        ]);
        factory(Menu::class)->create([
            'name' => 'หัวหอมทอด',
            'price' => 55.0,
            'image_path' => '',
            'category_id' => 1,
        ]);
        factory(Menu::class)->create([
            'name' => 'ซีซ่าร์สลัด',
            'price' => 115.0,
            'image_path' => '',
            'category_id' => 1,
        ]);
        factory(Menu::class)->create([
            'name' => 'ขนมปังกระเทียม',
            'price' => 95.0,
            'image_path' => '',
            'category_id' => 1,
        ]);
        factory(Menu::class)->create([
            'name' => 'ผักโขมอบชีส',
            'price' => 180.0,
            'image_path' => '',
            'category_id' => 1,
        ]);


//Main course category_id = 2
        factory(Menu::class)->create([
        	'name' => 'ปลากระพงราดน้ำปลา',
        	'price' => 70.0,
        	'image_path' => '',
        	'category_id' => 2,
    	]);
        factory(Menu::class)->create([
            'name' => 'ต้มยำกุ้ง',
            'price' => 75.0,
            'image_path' => '',
            'category_id' => 2,
        ]);
        factory(Menu::class)->create([
            'name' => 'แกงเขียวหวานไก่',
            'price' => 60.0,
            'image_path' => '',
            'category_id' => 2,
        ]);
        factory(Menu::class)->create([
            'name' => 'ปูผัดผงกะหรี่',
            'price' => 90.0,
            'image_path' => '',
            'category_id' => 2,
        ]);
        factory(Menu::class)->create([
            'name' => 'ผัดผักรวมมิตร',
            'price' => 69.0,
            'image_path' => '',
            'category_id' => 2,
        ]);
        factory(Menu::class)->create([
            'name' => 'ทอดมันกุ้ง',
            'price' => 65.0,
            'image_path' => '',
            'category_id' => 2,
        ]);
        factory(Menu::class)->create([
            'name' => 'ไข่เจียว',
            'price' => 30.0,
            'image_path' => '',
            'category_id' => 2,
        ]);
        factory(Menu::class)->create([
            'name' => 'แกงจืดหมูสับ',
            'price' => 70.0,
            'image_path' => '',
            'category_id' => 2,
        ]);

//Beverage category_id = 3
    	factory(Menu::class)->create([
        	'name' => 'น้ำเปล่า',
        	'price' => 15.0,
        	'image_path' => '',
        	'category_id' => 3,
    	]);
        factory(Menu::class)->create([
            'name' => 'น้ำส้ม',
            'price' => 45.0,
            'image_path' => '',
            'category_id' => 3,
        ]);
        factory(Menu::class)->create([
            'name' => 'โค้ก',
            'price' => 25.0,
            'image_path' => '',
            'category_id' => 3,
        ]);
        factory(Menu::class)->create([
            'name' => 'ชาเขียว',
            'price' => 30.0,
            'image_path' => '',
            'category_id' => 3,
        ]);
        factory(Menu::class)->create([
            'name' => 'น้ำเก๊กฮวย',
            'price' => 25.0,
            'image_path' => '',
            'category_id' => 3,
        ]);


    	//Dessert category_id = 4
    	factory(Menu::class)->create([
        	'name' => 'ไอศกรีมวานิลลา',
        	'price' => 20.0,
        	'image_path' => '',
        	'category_id' => 4,
    	]);
        factory(Menu::class)->create([
            'name' => 'ไอศกรีมช็อกโกแลต',
            'price' => 20.0,
            'image_path' => '',
            'category_id' => 4,
        ]);
        factory(Menu::class)->create([
            'name' => 'ไอศกรีมมะพร้าว',
            'price' => 35.0,
            'image_path' => '',
            'category_id' => 4,
        ]);
        factory(Menu::class)->create([
            'name' => 'ฮันนี่โทสต์',
            'price' => 125.0,
            'image_path' => '',
            'category_id' => 4,
        ]);
        factory(Menu::class)->create([
            'name' => 'เค้กช็อกโกแลตลาวากับไอศกรีมวานิลลา',
            'price' => 135.0,
            'image_path' => '',
            'category_id' => 4,
        ]);
    }
}
