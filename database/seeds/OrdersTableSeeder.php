<?php

use Illuminate\Database\Seeder;
use App\Order as Order;
class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = factory(Order::class,3)->create();
    }
}
