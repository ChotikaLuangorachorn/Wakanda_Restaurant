<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Menu::class, 1)->create([
            'name' => 'มันฝรั่งทอด',
            'price' => 95.0,
            'image_path' => '',
            'category_id' => 1,
        ])->each(function($m){
        	$m->save();
        	$m->image_path = $m->id . ".jpg";
        	$m->save();
        });
    }
}
