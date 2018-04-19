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
        factory(Menu::class,1)->create([
            'name' => 'มันฝรั่งทอด',
            'price' => 95.0,
            'category_id' => 1,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
        factory(Menu::class,1)->create([
            'name' => 'หัวหอมทอด',
            'price' => 55.0,
            'category_id' => 1,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
        factory(Menu::class,1)->create([
            'name' => 'ซีซ่าร์สลัด',
            'price' => 115.0,
            'category_id' => 1,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
        factory(Menu::class,1)->create([
            'name' => 'ขนมปังกระเทียม',
            'price' => 95.0,
            'category_id' => 1,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
        factory(Menu::class,1)->create([
            'name' => 'ผักโขมอบชีส',
            'price' => 180.0,
            'category_id' => 1,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });


//Main course category_id = 2
        factory(Menu::class,1)->create([
        	'name' => 'ปลากระพงราดน้ำปลา',
        	'price' => 70.0,
        	'category_id' => 2,
    	])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
        factory(Menu::class,1)->create([
            'name' => 'ต้มยำกุ้ง',
            'price' => 75.0,
            'category_id' => 2,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
        factory(Menu::class,1)->create([
            'name' => 'แกงเขียวหวานไก่',
            'price' => 60.0,
            'category_id' => 2,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
        factory(Menu::class,1)->create([
            'name' => 'ปูผัดผงกะหรี่',
            'price' => 90.0,
            'category_id' => 2,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
        factory(Menu::class,1)->create([
            'name' => 'ผัดผักรวมมิตร',
            'price' => 69.0,
            'category_id' => 2,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
        factory(Menu::class,1)->create([
            'name' => 'ทอดมันกุ้ง',
            'price' => 65.0,
            'category_id' => 2,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
        factory(Menu::class,1)->create([
            'name' => 'ไข่เจียว',
            'price' => 30.0,
            'category_id' => 2,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
        factory(Menu::class,1)->create([
            'name' => 'แกงจืดหมูสับ',
            'price' => 70.0,
            'category_id' => 2,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });

//Beverage category_id = 3
    	factory(Menu::class,1)->create([
        	'name' => 'น้ำเปล่า',
        	'price' => 15.0,
        	'category_id' => 3,
    	]);
        factory(Menu::class,1)->create([
            'name' => 'น้ำส้ม',
            'price' => 45.0,
            'category_id' => 3,
        ]);
        factory(Menu::class,1)->create([
            'name' => 'โค้ก',
            'price' => 25.0,
            'category_id' => 3,
        ]);
        factory(Menu::class,1)->create([
            'name' => 'ชาเขียว',
            'price' => 30.0,
            'category_id' => 3,
        ]);
        factory(Menu::class,1)->create([
            'name' => 'น้ำเก๊กฮวย',
            'price' => 25.0,
            'category_id' => 3,
        ]);


    	//Dessert category_id = 4
    	factory(Menu::class,1)->create([
        	'name' => 'ไอศกรีมวานิลลา',
        	'price' => 20.0,
        	'category_id' => 4,
    	])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
        factory(Menu::class,1)->create([
            'name' => 'ไอศกรีมช็อกโกแลต',
            'price' => 20.0,
            'category_id' => 4,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
        factory(Menu::class,1)->create([
            'name' => 'ไอศกรีมมะพร้าว',
            'price' => 35.0,
            'category_id' => 4,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
        factory(Menu::class,1)->create([
            'name' => 'ฮันนี่โทสต์',
            'price' => 125.0,
            'category_id' => 4,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
        factory(Menu::class,1)->create([
            'name' => 'เค้กช็อกโกแลตลาวากับไอศกรีมวานิลลา',
            'price' => 135.0,
            'category_id' => 4,
        ])->each(function($menu){
            $menu->save();
            $menu->image_path = $menu->id . ".jpg";
            $menu->save();
        });
    }
}
