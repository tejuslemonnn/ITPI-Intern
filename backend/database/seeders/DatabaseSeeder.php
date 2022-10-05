<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;


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

        Room::create([
            'name' => 'Room 1'
        ]);

        Room::create([
            'name' => 'Room 2'
        ]);

        Room::create([
            'name' => 'Room 3'
        ]);
    }
}
