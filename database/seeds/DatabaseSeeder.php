<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            DiningTablesTableSeeder::class,
            CategoriesTableSeeder::class,
            MenusTableSeeder::class,
            ReceiptsTableSeeder::class,
            OrdersTableSeeder::class
        ]);
        
        // $this->call(DiningTablesTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(MenusTableSeeder::class);
    }
}
