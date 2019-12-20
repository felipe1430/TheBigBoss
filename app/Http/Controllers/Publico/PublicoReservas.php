<?php

namespace App\Http\Controllers\Publico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\empleados;
use App\reservas;
use App\servicios;
use DB;
use Carbon\Carbon;

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
  
        //80963

        return view('Reservas.CalendarioReserva',compact('barberos','calendar','servicios'));
    }


    public function crearEvento(Request $request){
      // dd( $request->all());
      // if ($request->ajax()) {
           

        $params_array   =$request->all();
        
        $nombreUser     =$params_array['nameUser'];
        $idUser         =$params_array['idUser'];
        $idBarbero      =$params_array['idBarbero'];
        $start_date     =$params_array['start_date'];
        $end_date       =$params_array['end_date'];

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
                     'estado_reserva' => 1, ]
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

        //dd($id); si llega el id hasta aca XDD
       

            
                


        unset($params_array['nameUser']);
        unset($params_array['idUser']);
        unset($params_array['idBarbero']);
        unset($params_array['start_date']);
        unset($params_array['start_date']);
        unset($params_array['end_date']);
        unset($params_array['_token']);

      //  dd($params_array);
       
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
                } catch (\Throwable $e) {
                    DB::rollback();
                   // dd($e,'2');
                    throw $e;
                }




                return redirect('Reservas/CalendarioReservas');



        }else{
            return redirect('Reservas/CalendarioReservas');

        }
        

//asdasdasdasd

        
        

        
      // }// if ajax fin 

    }
}
