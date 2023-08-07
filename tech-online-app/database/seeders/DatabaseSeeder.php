<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
            ]
        ]);
        DB::table('users')->insert([
            [
                'email' => 'khanhdat444@gmail.com',
                'username' => 'khanhdat4',
                'password' => bcrypt('11111111'),
            ]
        ]);
        DB::table('categories')->insert([
            ['name' => 'Phone'],
            ['name' => 'Camera'],
            ['name' => 'Computer'],
            ['name' => 'SmartWatch'],
            ['name' => 'HeadPhones'],
            ['name' => 'Gaming'],
        ]);
    }
}
