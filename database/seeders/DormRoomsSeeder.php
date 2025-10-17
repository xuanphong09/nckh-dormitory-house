<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\feedback;

class DormRoomsSeeder extends Seeder
{
    public function run(): void
    {
        // Example of 5 feedback submissions
        feedback::create([
            'student_id' => 3, 
            'title' => 'Air conditioner broken in room 203',
            'content' => 'The air conditioner is not cooling, please check.',
            'attachments' => ['image1.jpg', 'image2.jpg'],
        ]);

        feedback::create([
            'student_id' => 4,
            'title' => 'Water leakage in shared kitchen',
            'content' => 'Water is leaking from the faucet, needs urgent repair.',
            'attachments' => ['leak1.png'],
        ]);

        // Add more submissions if needed
    }
}
