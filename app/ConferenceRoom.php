<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConferenceRoom extends Model
{
    protected $table = 'conference_rooms';

    public $timestamps = false;

    protected $fillable=[
        'id', 'name', 'capacity'
    ];

    public function reservations(){
        return $this->hasMany('App\Reservation');
    }
}
