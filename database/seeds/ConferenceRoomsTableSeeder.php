<?php

use Illuminate\Database\Seeder;
use App\ConferenceRoom;

class ConferenceRoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ConferenceRoom::class, 5)->create();
    }
}
