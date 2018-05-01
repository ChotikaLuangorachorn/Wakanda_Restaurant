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
        $admin->nickname = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->role = 'owner';
        $admin->save();
        $admin->image_path = $admin->id . ".jpg";
        $admin->save();

        $chef = new App\User;
        $chef->password = bcrypt('chefpassword');
        $chef->firstname = 'chef';
        $chef->lastname = 'chef';
        $chef->nickname = 'chef';
        $chef->email = 'chef@example.com';
        $chef->role = 'chef';
        $chef->save();
        $chef->image_path = $chef->id . ".jpg";
        $chef->save();

        $waiter = new App\User;
        $waiter->password = bcrypt('waiterpassword');
        $waiter->firstname = 'waiter';
        $waiter->lastname = 'waiter';
        $waiter->nickname = 'waiter';
        $waiter->email = 'waiter@example.com';
        $waiter->role = 'waiter';
        $waiter->save();
        $waiter->image_path = $waiter->id . ".jpg";
        $waiter->save();

        // $user = factory(App\User::class,10)->create([
        //     'password' => bcrypt('user')
        // ]);

        for ($i=0; $i < 10; $i++) { 
            $user = factory(App\User::class,1)->create([
                'password' => bcrypt('user')
            ])->each(function($user){
                $user->save();
                $user->image_path = $user->id . ".jpg";
                $user->save();
            });
        }

    }
}
