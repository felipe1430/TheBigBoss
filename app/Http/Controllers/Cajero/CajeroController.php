<?php

namespace App\Http\Controllers\Cajero;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\empleados;
use App\User;
use Session;
use App\servicios;
use App\gastos;
use Carbon\Carbon;

class CajeroController extends Controller
{

    public function index(){

        return view('cajero.index');
    }


    public function ventas(Request $request)
    {

      $Servicio=DB::table('servicios')->get()
      ->where('estado_servicios',1);

      // ->orderBy('desv', 'desc')

      $empleado=DB::table('empleados')->get()
      ->where('estado_empleado',1);
      
    
      return view('cajero.ventas',compact('Servicio','empleado'));

    }


    public function enviarpago(Request $request)
    {

      

       $cantidad=$request->cantidad;
       $servicios=$request->servicios;

       
        $pago = DB::table('servicios')
        ->wherein('id_servicios',$request->servicios)
        ->get();

      
       $serv=count($servicios);
       $serv = $serv-1;

       //  dd($serv);
       DB::table('tabla_paso')->delete();


       for ($i = 0; $i <= $serv; $i++){


        DB::table('tabla_paso')->insert([
          'id_servicio_paso' => $pago[$i]->id_servicios,
          'nombre_servicio_paso'=>$pago[$i]->nombre_servicio,
          'valor_servicio_paso'=>$pago[$i]->valor_servicio,
          'cantidad_servicio_paso'=>$cantidad[$i],
          'total_paso'=>$pago[$i]->valor_servicio*$cantidad[$i],
          'id_trabajador_paso'=>$request->trabajador
          

          ]);

          
       }

       $Serviciopaso=DB::table('tabla_paso')->get();



        $empleado=$Serviciopaso[0]->id_trabajador_paso;

        $trabajador=DB::table('empleados')
        ->where('id_empleado',$empleado)
        ->get();


        $date = Carbon::now("Chile/Continental");


       return view('cajero.confirmarpago',compact('Serviciopaso','trabajador','date','empleado'));
 
    }


    public function confirmar(Request $request)
    {

      

      DB::table('ventas')->insert([
        'fk_usuario_venta' => 1,
        'fk_empleado_venta'=>$request->idempleado,
        'fk_reserva_venta'=>null,
        'fecha_venta'=>$request->fechaservicio,
        'total_venta'=>$request->total

        
        ]);


        $ventas=DB::table('ventas')->max('id_ventas');
        $tbpaso=DB::table('tabla_paso')->get();
        $conteo=DB::table('tabla_paso')->count('id_servicio_paso');
        $conteo = $conteo-1;

        
        

        for ($i = 0; $i <= $conteo; $i++){


          DB::table('detalle_ventas')->insert([
            'cantidad_detalle_venta' => $tbpaso[$i]->cantidad_servicio_paso,
            'fk_servicio_detall_venta'=> $tbpaso[$i]->id_servicio_paso,
            'fk_venta_detall_venta'=> $ventas
            
  
            ]);
  
            
         }





      $Servicio=DB::table('servicios')->get()
      ->where('estado_servicios',1);


      $empleado=DB::table('empleados')->get()
      ->where('estado_empleado',1);

      
      Session::flash('success','Venta Realizada');

    
      return view('cajero.ventas',compact('Servicio','empleado'));

    }


    public function Reservas(Request $request)
    {

      $Reserva=DB::table('reserva')
      ->orderBy('id_reserva', 'desc')->get();
      
    
      return view('cajero.Reservas',compact('Reserva'));

    }


    public function Reservaspago($id_reserva){

      $idreserva = $id_reserva;

      $encabezado = DB::table('reservas')
      ->where('id_reserva','=',$id_reserva)
      ->get();


      $detalle = DB::table('detalle_reserva')
      ->where('fk_reserva','=',$id_reserva)
      ->get();


      $cliente = DB::table('users')
      ->where('id','=',$encabezado[0]->fk_id_usuario)
      ->get();

      $trabajador = DB::table('empleados')
      ->where('id_empleado','=',$encabezado[0]->fk_id_empleado)
      ->get();

      $Servicio=DB::table('servicios')->get()
      ->where('estado_servicios',1);




      return view('cajero.PagoReserva',compact('encabezado','detalle','cliente','trabajador','Servicio','id_reserva'));
        
      
    }


    public function enviarpagoreserva (Request $request){
      
      dd($request->all());

      $cantidad=$request->cantidad;
      $servicios=$request->servicios;

      // dd($servicios);

      $pago = DB::table('servicios')
      ->wherein('id_servicios',$request->servicios)
      ->get();


      // dd($pago);


    
     $serv=count($servicios);
     $serv = $serv-1;

     DB::table('tabla_paso_reserva')->delete();

     for ($i = 0; $i <= $serv; $i++){


      DB::table('tabla_paso_reserva')->insert([
        'nombre_cliente_paso_reserva' => $request->nombrecliente,
        'apellido_cliente_paso_reserva'=>$request->apellidocliente,
        'id_cliente_paso_reserva'=>$request->idcliente,
        'trabajador_paso_reseva'=>$request->trabajador,
        'id_trabajador_paso_reserva'=>$request->idtrabajador,
        'id_servicios_paso_reserva'=>$pago[$i]->id_servicios,
        'id_reserva_paso'=>$request->idreserva,
        'hora_inicio_paso_reserva'=>$request->horainicio,
        'hora_fin_paso_reserva'=>$request->horatermino,
        'nombre_servicio_paso_reserva'=>$pago[$i]->nombre_servicio,
        'cantidad'=>$cantidad[$i],
        'valor_paso_reserva'=>$pago[$i]->valor_servicio,
        'total_paso_reserva'=>$pago[$i]->valor_servicio*$cantidad[$i]
        

        ]);

        $Serviciopasoreserva=DB::table('tabla_paso_reserva')->get();



        $trabajador = DB::table('empleados')
        ->where('id_empleado','=',$Serviciopasoreserva[0]->id_trabajador_paso_reserva)
        ->get();

        
     }

     $date = Carbon::now("Chile/Continental");
  


      return view('cajero.confirmarpagoreserva',compact('Serviciopasoreserva','trabajador','date'));
    }

    public function confirmarventareserva(Request $request)
    {

      // dd($request->all());

      DB::table('ventas')->insert([
        'fk_usuario_venta' => $request->idcliente,
        'fk_empleado_venta'=>$request->idempleado,
        'fk_reserva_venta'=>$request->idreserva,
        'fecha_venta'=>$request->fechaservicio,
        'total_venta'=>$request->total

        
        ]);


        $ventas=DB::table('ventas')->max('id_ventas');
        $tbpaso=DB::table('tabla_paso_reserva')->get();
        $conteo=DB::table('tabla_paso_reserva')->count('id_servicios_paso_reserva');
        $conteo = $conteo-1;

        
        

        for ($i = 0; $i <= $conteo; $i++){


          DB::table('detalle_ventas')->insert([
            'cantidad_detalle_venta' => $tbpaso[$i]->cantidad,
            'fk_servicio_detall_venta'=> $tbpaso[$i]->id_servicios_paso_reserva,
            'fk_venta_detall_venta'=> $ventas
            
  
            ]);
  
            
         }





      $Servicio=DB::table('servicios')->get()
      ->where('estado_servicios',1);


      $empleado=DB::table('empleados')->get()
      ->where('estado_empleado',1);

      
      Session::flash('success','Venta Realizada');

    
      return view('cajero.index');

    }



}
