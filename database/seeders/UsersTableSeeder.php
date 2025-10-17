<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        //  Tắt kiểm tra khóa ngoại tạm thời
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Tạo 1 quản lý chính
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'email' => 'admin@example.com',
            'phone' => '0123456789',
            'full_name' => 'Quản lý chính',
            'role' => 'root',
        ]);

        // 7 quản lý tòa
        for ($i = 1; $i <= 7; $i++) {
            DB::table('users')->insert([
                'username' => "qltoa$i",
                'password' => Hash::make('123456'),
                'email' => "qltoa$i@example.com",
                'phone' => "090000000$i",
                'full_name' => "Quản lý tòa $i",
                'role' => 'admin',
            ]);
        }

        // 10 sinh viên
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'username' => "sv$i",
                'password' => Hash::make('123456'),
                'email' => "sv$i@example.com",
                'phone' => "091111111$i",
                'full_name' => "Sinh viên $i",
                'role' => 'student',
            ]);
        }
    }
}
