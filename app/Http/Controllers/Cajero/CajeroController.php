<?php

namespace App\Http\Controllers\Cajero;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\empleados;
use App\User;
use App\reservas;
use App\DetalleReserva;
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

     // dd($request->all());

       $cantidad=$request->cantidad;
       $servicios=$request->servicios;
       $id_user=$request->User;

       
        $pago = DB::table('servicios')
        ->wherein('id_servicios',$request->servicios)
        ->get();

        $User = DB::table('users')
        ->where('id',$request->User)
        ->get();

        //dd($User);
      
       $serv=count($servicios);
       $serv = $serv-1;

       
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


       return view('cajero.confirmarpago',compact('Serviciopaso','trabajador','date','empleado','User'));
 
    }


    public function confirmar(Request $request)
    {
      
      $ValidarVenta=DB::table('ventas')
      ->where('fk_usuario_venta',$request->id_user)
      ->where('fk_empleado_venta',$request->idempleado)
      ->where('fecha_venta',$request->fechaservicio)
      ->get();

      if($ValidarVenta->isNotEmpty()){

        Session::flash('error','La venta ya fue realizada');
        return redirect()->route('ventascajero');
        

      }else{


            
          
         // dd($request->all());

            
            DB::table('ventas')->insert([
              'fk_usuario_venta' => $request->id_user,
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

      }
      //return view('cajero.ventas',compact('Servicio','empleado'));
      return redirect()->route('ventascajero');

    }


    public function Reservas(Request $request)
    {
/*
      $Reserva=DB::table('reserva')
      ->orderBy('id_reserva', 'desc')->get();
      */
      $Reserva=reservas::with('Servicios','User','Empleado')->get();
    
      return view('cajero.Reservas',compact('Reserva'));

    }


    public function Reservaspago($id_reserva){

     //dd($id_reserva);
      
      if(empty($id_reserva) || $id_reserva == 0){
        Session::flash('error','algo a salido mal :C');
        return redirect()->route('Reservas');
      }
      $Reserva=reservas::with('Servicios','User','Empleado')
      ->where('id_reserva',$id_reserva)
      ->get();
      $ServiciosReservados=DB::table('detalle_reserva')
      ->select('servicios.*', 'detalle_reserva.cantidad_serv_det_reserva as CantidadServicio','detalle_reserva.fk_reserva')
      ->join('servicios', 'detalle_reserva.fk_servicio', '=', 'servicios.id_servicios')
      ->where('detalle_reserva.fk_reserva',$id_reserva)
      ->get();
      $data=[];
      foreach ($ServiciosReservados as $key) {

        $data[]=$key->id_servicios;
      }
      $ServiciosNoReservados=DB::table('servicios')
      ->whereNotIn('id_servicios',$data)
      ->get();


















/*
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


*/

      return view('cajero.PagoReserva',compact('Reserva','ServiciosReservados','ServiciosNoReservados'));
        
      
    }


    public function enviarpagoreserva (Request $request){
      
      // dd($request->all());
      $id_reserva=$request->idreserva;
      $cantidad=$request->cantidad;
      $servicios=$request->servicios;

      //  dd($servicios);

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
  


      return view('cajero.confirmarpagoreserva',compact('Serviciopasoreserva','trabajador','date','id_reserva'));
    }

    public function confirmarventareserva(Request $request)
    {

      $confirmarReserva=DB::table('reservas')
      ->where('id_reserva',$request->id_RESERVA)
      ->where('estado_reserva','PENDIENTE')
      ->get();

      if($confirmarReserva->isEmpty()){

        Session::flash('error','Venta ya fue realizada');

        return redirect()->route('Reservascajero');
      }else{


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

                  $ValorServ=DB::table('servicios')
                  ->select('valor_servicio')
                  ->where('id_servicios','=',$tbpaso[$i]->id_servicios_paso_reserva)
                  ->get();
                 //dd($ValorServ[0]->valor_servicio);

                  DB::table('detalle_ventas')->insert([
                    'cantidad_detalle_venta' => $tbpaso[$i]->cantidad,
                    'fk_servicio_detall_venta'=> $tbpaso[$i]->id_servicios_paso_reserva,
                    'fk_venta_detall_venta'=> $ventas,
                    'valor_servicio_historico'=>$ValorServ[0]->valor_servicio
                    
          
                    ]);
          
                    
                }


                DB::table('reservas')
                ->where('id_reserva', $request->id_RESERVA)
                ->where('estado_reserva', 'PENDIENTE')
                ->update(['estado_reserva' => 'PAGADA']);

                 

          



              $Servicio=DB::table('servicios')->get()
              ->where('estado_servicios',1);


              $empleado=DB::table('empleados')->get()
              ->where('estado_empleado',1);

              
              Session::flash('success','Venta Realizada');
        }
    
        return redirect()->route('Reservascajero');

    }



    public function reporteventascajero (Request $request){


      $reporte = DB::table('reporte_ventas_cajera')
      ->get();


      
      return view('cajero.ReportesVentasCajero',compact('reporte'));

    }


    public function infodesarrolladorescaja (){
    
      return view('cajero.informacioncajero');
    }

    public function BuscarUser(Request $request){
      //dd($request->all());
      $Users = DB::table('users')
      ->select('id','name','surname','email')
      ->where('name', 'like','%'.$request->Nombre.'%')
      ->get();
     // dd($Users);

      $data=[
        //"reservas"=> $reservas,
        "Users"=>$Users
       ];

   // dd($reservas,$bloques);
    return response()->json(
            $data
        );
      //dd($request->all(),$empleados);

    }


    public function ListarUsuarios(Request $request)
    {
      
      $usuarios=DB::table('users')
      ->where('fk_tipo_user',3)
      ->get();

    
      return view('cajero.ListarUsuarios',compact('usuarios'));
    }

    public function actualizarusuarios(Request $request)
    {

      $usuario = User::findOrfail($request->id);
      $usuario->id=$request->get('id');
      $usuario->name=$request->get('name');
      $usuario->surname=$request->get('surname');
      $usuario->rut=$request->get('rut');
      $usuario->email=$request->get('email');
      $usuario->fecha_nacimiento=$request->get('fecha_nacimiento');
      $usuario->telefono=$request->get('telefono');
      $usuario->update();
      return back();
    }

    public function CancelarReserva($id_reserva){

      DB::table('reservas')
                ->where('id_reserva', $id_reserva)
                ->where('estado_reserva', 'PENDIENTE')
                ->update(['estado_reserva' => 'CANCELADA']);



     return back();
    }

    
    
    






}
