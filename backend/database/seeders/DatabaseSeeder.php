<?php

namespace Database\Seeders;

use App\Models\RoomMessage;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\room;


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

<<<<<<< Updated upstream
        RoomMessage::create([
            'name' => 'Room 001',
        ]);
        RoomMessage::create([
            'name' => 'Room 002',
        ]);
        RoomMessage::create([
            'name' => 'Room 003',
        ]);
=======
        room::create([
            "name" => "001",
        ]);

        room::create([
            "name" => "002",
        ]);
        

>>>>>>> Stashed changes
    }
}
