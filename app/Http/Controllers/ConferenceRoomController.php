<?php

namespace App\Http\Controllers;
Use Illuminate\Http\Request;
use App\Reservation;
use App\ConferenceRoom;

class ConferenceRoomController extends Controller
{

    public function index(){

        return ConferenceRoom::all();
    }

}
