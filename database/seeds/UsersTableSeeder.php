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
        $user = factory(App\User::class,10)->create([
            'password' => bcrypt('user')
        ]);

    }
}
