<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    protected $table = 'reservations';

    public $timestamps = false;

    protected $fillable=[
        'id', 'conference_room_id', 'email_applicant', 'start_time_date', 'finish_time_date',
        'status', 'description'
    ];

    public function conferenceRoom(){
        return $this->belongsTo('App\ConferenceRoom')->withDefault();
    }

    public function scopeSearchPrevius($query, $request){
        return $query
            ->where('conference_room_id', $request->conference_room_id)
            ->where('status', 'ativo')
            ->where((function($q) use ($request) {
                $q->whereBetween('start_time_date', [$request->start_time_date, $request->finish_time_date]) 
                ->orWhereBetween('finish_time_date', [$request->start_time_date, $request->finish_time_date])
                ->orWhereRaw('? BETWEEN start_time_date and finish_time_date', [$request->start_time_date]) 
                ->orWhereRaw('? BETWEEN start_time_date and finish_time_date', [$request->finish_time_date]);
            }));

    }
}
