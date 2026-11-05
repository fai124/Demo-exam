<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            ['name' => 'Аудитория', 'price' => 5000],
            ['name' => 'Коворкинг', 'price' => 3000],
            ['name' => 'Кинозал', 'price' => 7000],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
