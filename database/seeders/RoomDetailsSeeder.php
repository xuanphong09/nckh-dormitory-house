<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoomDetailsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('room_details')->truncate();

        // Fetch available dormitory rooms
        $dormitoryRooms = DB::table('dormitory_rooms')->get();

        $profilePictures = [
            'student1.jpg', 'student2.jpg', 'student3.jpg', 'student4.jpg', 'student5.jpg',
            'student6.jpg', 'student7.jpg', 'student8.jpg', 'student9.jpg', 'student10.jpg',
        ];

        $students = [];
        $now = Carbon::now();

        foreach ($dormitoryRooms as $room) {
            $studentCount = rand(2, 5); // Each room has 2–5 students
            for ($i = 1; $i <= $studentCount; $i++) {
                $paymentStatus = rand(0, 1); // 0 = unpaid, 1 = paid
                $pictures = json_encode(array_rand(array_flip($profilePictures), rand(1, 3)));

                $students[] = [
                    'dormitory_room_id' => $room->id,
                    'room_number' => $room->room_number,
                    'student_name' => fake()->name(),
                    'student_id' => 'ST' . rand(10000, 99999),
                    'class' => 'IT' . rand(1, 5),
                    'birth_date' => fake()->dateTimeBetween('-25 years', '-20 years'),
                    'phone' => '09' . rand(10000000, 99999999),
                    'address' => fake()->city(),
                    'rental_date' => $now->copy()->subMonths(rand(1, 12)),
                    'profile_pictures' => $pictures,
                    'payment_status' => $paymentStatus,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }

            // After creating students for the room, check if all have paid
            $unpaidCount = collect($students)
                ->where('dormitory_room_id', $room->id)
                ->where('payment_status', false)
                ->count();

            // Update the rent_paid column in dormitory_rooms
            DB::table('dormitory_rooms')
                ->where('id', $room->id)
                ->update(['rent_paid' => $unpaidCount === 0]);
        }

        DB::table('room_details')->insert($students);
    }
}
