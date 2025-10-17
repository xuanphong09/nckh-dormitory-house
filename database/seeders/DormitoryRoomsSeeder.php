<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DormitoryRoomsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dormitory_rooms')->delete();

        $dormitories = [
            ['id_dormitory' => 1, 'name' => 'B4', 'floors' => 3, 'price' => 350000],
            ['id_dormitory' => 2, 'name' => 'A2', 'floors' => 3, 'price' => 350000],
            ['id_dormitory' => 3, 'name' => 'B3', 'floors' => 3, 'price' => 350000],
            ['id_dormitory' => 4, 'name' => 'C3', 'floors' => 7, 'price' => 450000],
            ['id_dormitory' => 5, 'name' => 'C4', 'floors' => 7, 'price' => 450000],
            ['id_dormitory' => 6, 'name' => 'C5', 'floors' => 7, 'price' => 450000],
            ['id_dormitory' => 7, 'name' => 'C2', 'floors' => 5, 'price' => 400000],
        ];

        $data = [];

        foreach ($dormitories as $dormitory) {
            for ($floor = 1; $floor <= $dormitory['floors']; $floor++) {
                $roomCount = rand(5, 10);
                $occupied = rand(10, $roomCount * 10);
                $vacant = $roomCount * 10 - $occupied;

                $rentPaid = rand(0, 1) === 1;

                $facilities = in_array($dormitory['name'], ['C3', 'C4', 'C5'])
                    ? 'Computers, study room, desks, wardrobes, lights, fans'
                    : 'Lights, ceiling fans, desks, wardrobes';

                $data[] = [
                    'dormitory_id' => $dormitory['id_dormitory'],
                    'floor_number' => $floor,
                    'price' => $dormitory['price'],
                    'room_count' => $roomCount,
                    'occupied' => $occupied,
                    'vacant' => $vacant,
                    'rent_paid' => $rentPaid, // ✅ Boolean
                    'facilities' => $facilities,
                    'last_updated' => Carbon::now(),
                ];
            }
        }

        DB::table('dormitory_rooms')->insert($data);
    }
}
