<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class create_users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'lekhanhluan1@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 0,
            'address' => 'Hà Nội',
        ]);
        \DB::table('users')->insert([
            'name' => 'user',
            'email' => 'lekhanhluan2@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 2,
            'address' => 'Hà Nội',
        ]);
        \DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'lekhanhluan3@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 2,
            'address' => 'Hà Nội',
        ]);
        \DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'lekhanhluan3@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 2,
            'address' => 'Hà Nội',
        ]);

    }
}
