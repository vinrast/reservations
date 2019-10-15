<?php

namespace App\Http\Controllers;
Use Illuminate\Http\Request;
use App\Reservation;
use App\ConferenceRoom;


class ReservationController extends Controller
{

    public function index(){

        return Reservation::all(); 
    }

    public function store(Request $request){

        $validator = $this->validateCustom($request);

        $query = Reservation::searchPrevius($request)->get(); 

        if(count($query)){
            return response()->json(['message' => 'sala de reuniões ocupada','previus'=>$query], 422);
        }

        return response()->json(['message' => 'reserva criada com sucesso ', 'reserva'=> Reservation::create($validator)], 200);
    }

    public function update($id){
        
        $reservation = Reservation::find($id);

        if(!$reservation){
            return response()->json(['message' => 'esta reserva não existe'], 422);
        }

        if($reservation->status === 'cancelado'){
            return response()->json(['message' => 'esta reserva já foi cancelada', 'reserva'=> $reservation], 422);
        }

        $reservation->status = 'cancelado';
        $reservation->save();

        return response()->json(['message' => 'reserva cancelada com sucesso', 'reserva'=> $reservation], 200);
    }

    protected function validateCustom($request){

        return $this->validate($request, [
            'conference_room_id'=>'required',
            'email_applicant'=> 'required|email', 
            'start_time_date'=> 'required|date_format:Y-m-d H:i:s', 
            'finish_time_date'=> 'required|date_format:Y-m-d H:i:s|after:start_time_date',
            'status'=> 'required', 
            'description'=> 'required'
        ],[
            'conference_room_id.required'=> 'O campo de sala de reunião é obrigatório.',
            'email_applicant.required'=> 'O campo de requerente de email é obrigatório.',
            'email_applicant.email'=> 'O requerente de email deve ser um endereço de email válido.',
            'start_time_date.required'=> 'O campo de data e hora do início da reunião é obrigatório.',
            'start_time_date.date_format'=> 'A data de hora de início não corresponde ao formato Y-m-d H:i:s',
            'finish_time_date.required'=> 'O campo de data e hora do término da reunião é obrigatório.',
            'finish_time_date.date_format'=> 'A data de hora de término não corresponde ao formato Y-m-d H:i:s',
            'finish_time_date.after' => 'A data de término deve ser uma hora após a data de início.',
            'status.required'=> 'O campo de situação do agendamento é obrigatório.',
            'description.required' => 'O campo de descrição do agendamento é obrigatório.'
        ]);
    }

}
