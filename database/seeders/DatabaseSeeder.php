<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        User::factory()->create([
            'username' => 'Test User', // Updated to match the correct column name
            'email' => 'test@example.com',
        ]);

        // Call other seeders if they exist
        $this->callIfExists([
            UsersTableSeeder::class,
            DormitoryManagersTableSeeder::class,
            RoomDetailsSeeder::class, // child table
            DormitoryRoomsSeeder::class, // parent table
            DormRoomsSeeder::class,
            RentalRoomsSeeder::class,
        ]);
    }

    protected function callIfExists(array $seeders): void
    {
        foreach ($seeders as $seeder) {
            if (class_exists($seeder)) {
                $this->call($seeder);
            }
        }
    }
}
