<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Roles;
use DateTime;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'Luu Dinh Duong',
            'email' => 'luudinhduong28061999@gmail.com',
            'password' => '123456',
            'phone' => '0377564124',
            'address' => 'HN',
            'status' => '0' // chuc vu admin status = 0
        ]);

    }
}
