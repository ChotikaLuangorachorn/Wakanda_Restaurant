<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $admin = new App\User;
        $admin->password = bcrypt('adminpassword');
        $admin->firstname = 'Administrator';
        $admin->lastname = 'Administrator';
        $admin->email = 'admin@example.com';
        $admin->role = 'owner';
        $admin->save();

        $chef = new App\User;
        $chef->password = bcrypt('chefpassword');
        $chef->firstname = 'chef';
        $chef->lastname = 'chef';
        $chef->email = 'chef@example.com';
        $chef->role = 'chef';
        $chef->save();

        $waiter = new App\User;
        $waiter->password = bcrypt('waiterpassword');
        $waiter->firstname = 'waiter';
        $waiter->lastname = 'waiter';
        $waiter->email = 'waiter@example.com';
        $waiter->role = 'waiter';
        $waiter->save();

        $user = factory(App\User::class,10)->create([
            'password' => bcrypt('user')
        ]);

    }
}
