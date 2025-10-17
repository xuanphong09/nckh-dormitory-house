<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DormitoryManagersTableSeeder extends Seeder
{
    public function run(): void
    {
        //  Tạm tắt kiểm tra khóa ngoại để có thể truncate
        Schema::disableForeignKeyConstraints();

        //  Xóa toàn bộ dữ liệu cũ
        DB::table('dormitory_managers')->truncate();

        //  Bật lại kiểm tra khóa ngoại
        Schema::enableForeignKeyConstraints();

        //  Dữ liệu mẫu
        $data = [
            [
                'dormitory_name' => 'B4',
                'floors' => 3,
                'manager_id' => 2, // user id 2 is the manager of dormitory B4
                'room_count' => 30,
            ],
            [
                'dormitory_name' => 'A2',
                'floors' => 3,
                'manager_id' => 3,
                'room_count' => 28,
            ],
            [
                'dormitory_name' => 'B3',
                'floors' => 3,
                'manager_id' => 4,
                'room_count' => 32,
            ],
            [
                'dormitory_name' => 'C3',
                'floors' => 7,
                'manager_id' => 5,
                'room_count' => 60,
            ],
            [
                'dormitory_name' => 'C4',
                'floors' => 7,
                'manager_id' => 6,
                'room_count' => 65,
            ],
            [
                'dormitory_name' => 'C5',
                'floors' => 7,
                'manager_id' => 7,
                'room_count' => 70,
            ],
            [
                'dormitory_name' => 'C2',
                'floors' => 5,
                'manager_id' => 8,
                'room_count' => 45,
            ],
        ];

        DB::table('dormitory_managers')->insert($data);
    }
}
