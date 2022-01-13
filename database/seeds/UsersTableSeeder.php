<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=User::create([
        	'name'=>'Ma Ma',
        	'profile'=>'images/user/admin.png',
        	'email'=>'admin@gmail.com',
        	'password'=>Hash::make('admin123'),
        	'phone'=>'09254779212',
        	'address'=>'Monywa'
        ]);

        $admin->assignRole('admin');

        $customer=User::create([
        	'name'=>'Mg Mg',
        	'profile'=>'images/user/customer.jpeg',
        	'email'=>'mgmg@gmail.com',
        	'password'=>Hash::make('mgmg123'),
        	'phone'=>'09778921204',
        	'address'=>'Yangon'
        ]);

        $customer->assignRole('customer');
    }
}
