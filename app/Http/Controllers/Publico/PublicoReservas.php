<?php

namespace App\Http\Controllers\Publico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\empleados;
use App\reservas;
use App\servicios;

class PublicoReservas extends Controller
{
    
    public function index(){

    $barberos = empleados::where('fk_empleado_tipo_user',2)->get(); // el 2 es solo barberos 
    //dd($barberos);

     return view('Reservas.ReservasCliente',compact('barberos'));

    }

    public function cargarCalendario($id){
      
        $barberos = empleados::findOrFail($id);  
        $servicios = servicios::all();

        $events = reservas::where('fk_id_empleado',$id)->get(); 
       // dd($events);
        $event=[];
        foreach($events as $row){
            $enddate=$row->end_date;
            $event[]=\Calendar::event(
                $row->title,
                false,
                new \DateTime($row->start_date),
                new \DateTime($row->end_date),
                $row->id,
                [
                    'color'=>$row->color,
                ]
            );

        }

        $calendar=\Calendar::addEvents($event);
  
        

        return view('Reservas.CalendarioReserva',compact('barberos','calendar','servicios'));
    }


    public function crearEvento(Request $request){
       //dd( $request->all());

        $reserva = new reservas;
        $reserva->title = $request->nameUser;
        $reserva->color = '#1C669F';
        $reserva->start_date = $request->start_date;
        $reserva->end_date = $request->end_date;
        $reserva->fk_id_usuario = $request->idUser;
        $reserva->fk_id_empleado = $request->idBarbero;
        $reserva->fecha_reserva = '2019-11-27';
        $reserva->estado_reserva = 1;
        $reserva->save();


    }
}
