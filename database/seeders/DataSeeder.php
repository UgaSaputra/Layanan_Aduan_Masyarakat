<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>'Admin',
                'email'=>'Admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('123456789admin')
            ],
            [
                'name'=>'SuperAdmin',
                'email'=>'SuperAdmin@gmail.com',
                'role'=>'superadmin',
                'password'=>bcrypt('123456789superadmin')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
