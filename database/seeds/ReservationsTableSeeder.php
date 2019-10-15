<?php

use Illuminate\Database\Seeder;
use App\Reservation;
use App\ConferenceRoom;
use Carbon\Carbon;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservation::create([
            'conference_room_id' => ConferenceRoom::inRandomOrder()->first()->id,
            'email_applicant' => 'email_1',
            'start_time_date' => Carbon::now()->addHour(7)->toDateTimeString(),
            'finish_time_date' => Carbon::now()->addHour(10)->toDateTimeString(),
            'status'=>'ativo',
            'description'=> 'description 1'
        ]);

        Reservation::create([
            'conference_room_id' => ConferenceRoom::inRandomOrder()->first()->id,
            'email_applicant' => 'email_2',
            'start_time_date' => Carbon::now()->addHour()->toDateTimeString(),
            'finish_time_date' => Carbon::now()->addHour(2)->toDateTimeString(),
            'status'=>'ativo',
            'description'=> 'description 2'
        ]);

        Reservation::create([
            'conference_room_id' => ConferenceRoom::inRandomOrder()->first()->id,
            'email_applicant' => 'email_3',
            'start_time_date' => Carbon::now()->addHour(4)->toDateTimeString(),
            'finish_time_date' => Carbon::now()->addHour(5)->toDateTimeString(),
            'status'=>'cancelado',
            'description'=> 'description 3'
        ]);
    }
}
