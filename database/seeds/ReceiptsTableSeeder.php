<?php

use Illuminate\Database\Seeder;
use App\Receipt as Receipt;
class ReceiptsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$receipt = factory(Receipt::class,10)->create();

        
        
    }
}
