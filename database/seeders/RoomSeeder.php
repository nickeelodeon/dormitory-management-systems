<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            Room::create([
                'room_num' => 'R' . str_pad($i, 3, '0', STR_PAD_LEFT), // R001 to R020
                'capacity' => rand(2, 6),
                'current_occupants' => rand(0, 5),
                'gender' => ['Male', 'Female'][rand(0, 1)],
                'floor' => rand(1, 5),
                'status' => ['Available', 'Occupied', 'Maintenance'][rand(0, 2)],
                'rates' => rand(3000, 5000),
                'notes' => rand(0, 1) ? 'Spacious with good ventilation' : null,
            ]);
        }
    }
}
