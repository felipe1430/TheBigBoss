<?php

namespace App\Http\Controllers\Publico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\empleados;
use App\reservas;

class PublicoReservas extends Controller
{
    
    public function index(){

    $barberos = empleados::where('fk_empleado_tipo_user',2)->get();
    //dd($barberos);

     return view('Reservas.ReservasCliente',compact('barberos'));

    }

    public function cargarCalendario($id){
      
        $barberos = empleados::findOrFail($id);  

        $events = reservas::all(); 
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
  
        

        return view('Reservas.CalendarioReserva',compact('barberos','calendar'));
    }
}
