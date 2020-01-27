<?php

namespace App\Http\Controllers\Publico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\empleados;
use App\reservas;
use App\servicios;
use DB;
use Carbon\Carbon;
use Session;

class PublicoReservas extends Controller
{
    
    public function index(){

        //Carbon::setLocale( 'es_MX', 'es', 'ES');
    



    $barberos = empleados::where('fk_empleado_tipo_user',2)
                                ->where('estado_empleado',1)
                                ->get(); // el 2 es solo barberos 
    //dd($barberos);

     return view('Reservas.ReservasCliente',compact('barberos'));

    }

    public function cargarCalendario($id){
      
        $barberos = empleados::findOrFail($id);  

        $servicios=DB::table('servicios')
        ->join('empleado_servicio_detalle', 'empleado_servicio_detalle.fk_servicio', '=', 'servicios.id_servicios')
        ->where('fk_empleado',$id)
        ->where('empleado_servicio_detalle.estado',1)
        ->where('servicios.estado_servicios',1)
        ->get();

       // dd($servicios);

        $events = reservas::where('fk_id_empleado',$id)
        ->where('estado_reserva','PENDIENTE')
        ->get(); 
    //    $events =DB::table('reservas')
    //    ->where('estado_reserva','=',1)
    //    ->where('fk_id_empleado',$id)
    //    ->get();
       //dd($events);
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
  
        //80963

        return view('Reservas.CalendarioReserva',compact('barberos','calendar','servicios'));
    }


    public function crearEvento(Request $request){
      //  dd($request->all());
   //dd( $request->bloques,substr($request->bloques, 0,-13),substr($request->bloques,13));
      // if ($request->ajax()) {
        $params_array   =$request->all();
        $horaInicio=substr($request->bloques, 0,-13);
        $horaFin=substr($request->bloques,13);


        $confirmarReserva=DB::table('reservas')
        ->where('estado_reserva','PENDIENTE')
        ->where('start_date',$params_array['start_date'].' '.$horaInicio)
        ->where('fk_id_usuario',$params_array['idUser'])
        ->where('fk_id_usuario',$params_array['idUser'])
        ->where('fk_id_empleado',$params_array['idBarbero'])
        ->get();
        //dd($confirmarReserva ,$params_array['start_date'].' '.$horaInicio);

        if($confirmarReserva->isNotEmpty()){

            Session::flash('error','ya se ha reservado esa hora ');
            return redirect()->route('calendario',$params_array['idBarbero']);

        }else{



        }
        // $horaInicio=substr($request->bloques, 0,-13);
        // $horaFin=substr($request->bloques,13);

        // $params_array   =$request->all();
        
        $nombreUser     =$params_array['nameUser'];
        $idUser         =$params_array['idUser'];
        $idBarbero      =$params_array['idBarbero'];
        $start_date     =$params_array['start_date'].' '.$horaInicio;
        //dd($params_array['start_date'].' '.$horaInicio);
        $end_date       =$params_array['start_date'].' '.$horaFin;

        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $id=0;


        

        try{
           
            DB::beginTransaction();

                $id = DB::table('reservas')->insertGetId(
                    ['title' => $nombreUser,
                     'color' => '#1C669F',
                     'start_date' => $start_date,
                     'end_date' => $end_date,
                     'fk_id_usuario' => $idUser,
                     'fk_id_empleado' => $idBarbero,
                     'fecha_reserva' => $date,
                     'estado_reserva' => 'PENDIENTE', ]
                );
                /*
                        $reserva->title = $nombreUser;
                        $reserva->color = '#1C669F';
                        $reserva->start_date =  $start_date;
                        $reserva->end_date =  $end_date; 
                        $reserva->fk_id_usuario =  $idUser;
                        $reserva->fk_id_empleado = $idBarbero;  
                        $reserva->fecha_reserva = $date;
                        $reserva->estado_reserva = 1;
                        //**/
            DB::commit();

        }catch(Exception $e){
            DB::rollback();
            dd($e,'1');
        } catch (\Throwable $e) {
            DB::rollback();
            dd($e,'2');
            throw $e;
        }

        //dd('molesta'); //si llega el id hasta aca XDD
        unset($params_array['nameUser']);
        unset($params_array['idUser']);
        unset($params_array['idBarbero']);
        unset($params_array['start_date']);
        unset($params_array['start_date']);
        unset($params_array['end_date']);
        unset($params_array['_token']);

        $servicios= $params_array['servicios'];
        $CountServicios=count($servicios);
        $CountServicios = $CountServicios -1;
        $cantidadDeServ = $params_array['cantidad'];
        //dd($servicios,$cantidadDeServ ,$CountServicios);
        if(!($id==0)){
          //  dd('si entro ');
                try{

                    DB::beginTransaction();

                    for ($i = 0; $i <=$CountServicios ; $i++) {

                        DB::table('detalle_reserva')->insert([
                            'fk_reserva'=>$id,
                            'fk_servicio'=>$servicios[$i],
                            'cantidad_serv_det_reserva'=>$cantidadDeServ[$i],
                            ]);

                    }
                            
                    DB::commit();
                }catch(Exception $e){
                    DB::rollback();
                    //dd($e,'1');
                 Session::flash('error','algo a salido mal');
                return redirect('Reservas/CalendarioReservas');
                } catch (\Throwable $e) {
                    DB::rollback();
                    Session::flash('error','algo a salido mal');
                return redirect('Reservas/CalendarioReservas');
                   // dd($e,'2');
                    //throw $e;
                }
//rama a reserva 2

            Session::flash('success','reserva realizada con exito');
                return redirect('Reservas/CalendarioReservas');



        }else{
            Session::flash('success','reserva realizada con exito');
        
            return redirect('Reservas/CalendarioReservas');

        }
      // }// if ajax fin 

    }





    public function horasDisponibles(Request $request){
       // dd($request->all());
        if ($request->ajax()) {
            $reservas=DB::table('reservas')
            ->select(DB::raw('time(start_date) as hora_inicio,time(end_date) as hora_termino'))
            ->whereDate('start_date', $request->Fecha)
            ->where('fk_id_empleado', $request->barberoId)
            ->where('estado_reserva', 'PENDIENTE')
            ->get();

            //dd(count($reservas),$reservas);
            $count=count($reservas);
            $horas=[];
            for ($i=0; $i <$count ; $i++) { 
                $horas[]=$reservas[$i]->hora_inicio;
            }
            //dd($horas);
            
            //dd($reservas[0]->hora_inicio );

            setlocale(LC_ALL, 'es_CL', 'es', 'ES');
            $dia=Carbon::createFromDate($request->Fecha,'Chile/Continental')->formatLocalized('%A');
            ///dd($dia);
            if($dia=='domingo'){
           // dd('si es dominfo');
                //dd(Carbon::now('Chile/Continental')->formatLocalized('%A'));  // todo esto para cargar los bloques de los domingos XD
                $bloques=DB::table('bloquesdehoras')
                ->where('estado','d')
                ->whereNotIn('hora_inicio',$horas )
                ->get();
            }else{
               // dd('cualquier dia de la semana');
  
                $bloques=DB::table('bloquesdehoras')
                ->where('estado','s')
                ->whereNotIn('hora_inicio',$horas )
                ->get();

            }
        
    
         

            $data=[
                //"reservas"=> $reservas,
                "bloques"=>$bloques
            ];

           // dd($reservas,$bloques);
            return response()->json(
                    $data
            );
        }

    }


    public function CargarDetalle(Request $request){
        //dd($request->all());
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $params_array   =$request->all();

        if($request->start_date <$date ){

            Session::flash('error','no puede reservar en esa fecha');
            return redirect('Reservas/CalendarioReservas/'.$params_array['idBarbero']);

        }
        


        $params_array   =$request->all();
        unset($params_array['_token']);
        $servicios= $params_array['servicios'];
        $cantidadDeServ = $params_array['cantidad'];
        $idBarbero =$params_array['idBarbero'];
        
        //dd($params_array,$servicios,$cantidadDeServ);


        $Barbero=DB::table('empleados')
        ->where('fk_empleado_tipo_user',2 )
        ->where('id_empleado',$idBarbero )
        ->get();
        //dd($Barbero);

        $serviciosSeleccionados=DB::table('servicios')
        ->whereIn('id_servicios',$servicios )
        ->get();
        //dd($serviciosSeleccionados,$servicios);
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        //dd($params_array);
        return view('Reservas.ConfirmarReserva',compact('params_array','Barbero','serviciosSeleccionados','date','cantidadDeServ','servicios'));


    }









}
