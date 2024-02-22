<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('laravel_users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')
        ]);

        DB::table('laravel_users')->insert([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('user')
        ]);

        DB::table('laravel_users')->insert([
            'name' => 'testuser',
            'email' => 'testuser@gmail.com',
            'password' => Hash::make('testuser')
        ]);
    }
}
