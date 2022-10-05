<?php

namespace Database\Seeders;

use App\Models\RoomMessage;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        RoomMessage::create([
            'name' => 'Room 001',
        ]);
        RoomMessage::create([
            'name' => 'Room 002',
        ]);
        RoomMessage::create([
            'name' => 'Room 003',
        ]);
    }
}
