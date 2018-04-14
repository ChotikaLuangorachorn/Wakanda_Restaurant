<?php

use Illuminate\Database\Seeder;

class DiningTablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\Dining_table::class,10)->create([
            
        ]);
    }
}
