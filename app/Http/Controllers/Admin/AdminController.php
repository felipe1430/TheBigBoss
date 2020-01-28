<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\empleados;
use App\User;
use App\reservas;
use App\DetalleReserva;
use Session;
use App\servicios;
use App\gastos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    

  public function index(){

        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        $compras=DB::table('fechas')
        ->where('estado',1)
        ->where('fechafort',$date)
        ->count();


        $registros=DB::table('users')
        ->count('id');
        
        $eliminados=DB::table('ventas')
        ->where('estado_venta',0)
        ->count('id_ventas');

        $ganancias=DB::table('fechas')
        ->where('estado',1)
        ->where('fechafort',$date)
        ->sum('total');
        



      

      return view('admin.index',compact('date','compras','registros','eliminados','ganancias'));


  }  

  //----------------------------------- CRUD EMPLEADOS ----------------------------------------//

    public function ListarEmpleados(Request $request)
    {
      
      $empleados=DB::table('empleados')
      ->join('tipo_user', 'tipo_user.id_tipo_user', '=', 'empleados.fk_empleado_tipo_user')
      ->where('estado_empleado',1)
      ->get();

      
    
      return view('admin.ListarEmpleados',compact('empleados'));
    }

    public function agregarempleado()
    {
      
      return view('admin.AgregarEmpleados');
    }

    public function empleados(Request $request)
    {

      empleados::create([

            
            'nombre_empleado' => $request->nombre_empleado,
            'apellido_empleado' => $request->apellido_empleado,
            'rut_empleado' => $request->rut_empleado,
            'correo_empleado' => $request->correo_empleado,
            'telefono_empleado' => $request->telefono_empleado,
            'comision_empleado' => $request->comision_empleado,
            'direccion_empleado' => $request->direccion_empleado,
            'fk_empleado_tipo_user' => $request->tipo,

        ]);
        
    



        $empleados=DB::table('empleados')
      ->join('tipo_user', 'tipo_user.id_tipo_user', '=', 'empleados.fk_empleado_tipo_user')
      ->get();

        return view('admin.ListarEmpleados',compact('empleados'));

    }

    public function actualizarempleados(Request $request)
    {
      // dd($request->all());
      $empleado = empleados::findOrfail($request->id_empleado);
      $empleado->id_empleado=$request->get('id_empleado');
      $empleado->nombre_empleado=$request->get('nombre_empleado');
      $empleado->apellido_empleado=$request->get('Apellido');
      $empleado->rut_empleado=$request->get('RUT');
      $empleado->correo_empleado=$request->get('email');
      $empleado->telefono_empleado=$request->get('telefono');
      $empleado->comision_empleado=$request->get('comision');
      $empleado->direccion_empleado=$request->get('Direccion');
      $empleado->fk_empleado_tipo_user=$request->get('fk_empleado_tipo_user');
      $empleado->estado_empleado=$request->get('Estado');
      $empleado->update();
      return back();
    }


    public function eliminarempleados(Request $request)
    {
      // dd($request->all());
      $empleado = empleados::findOrfail($request->id_empleado);
      $empleado->id_empleado=$request->get('id_empleado');
      $empleado->estado_empleado=$request->get('Estado');
      $empleado->update();
      return back();
    }

//----------------------------------- FIN CRUD EMPLEADOS ------------------------------------//


//----------------------------------- CRUD SERVICIOS ----------------------------------------//
    public function ListarServicios(Request $request)
    {
      
      $Servicio=DB::table('servicios')->get();

    
      return view('admin.ListarServicios',compact('Servicio'));
    }

    public function agregarservicios(Request $request){


    
      
      return view('admin.AgregarServicios');
    }

    public function actualizarservicios(Request $request)
    {
      // dd($request->all());
      $servicio = servicios::findOrfail($request->id_servicios);
      $servicio->id_servicios=$request->get('id_servicios');
      $servicio->nombre_servicio=$request->get('nombre_servicio');
      $servicio->descripcion_servicio=$request->get('descripcion_servicio');
      $servicio->valor_servicio=$request->get('valor_servicio');
      $servicio->estado_servicios=$request->get('estado_servicios');
      $servicio->update();
      return back();
    }


    public function servicios(Request $request)
    {
        servicios::create([

            
            'nombre_servicio' => $request->nombre_servicio,
            'descripcion_servicio' => $request->descripcion_servicio,
            'valor_servicio' => $request->valor_servicio,


        ]);

        $Servicio=DB::table('servicios')->get();

        return view('admin.ListarServicios',compact('Servicio'));

    }

    //-----------------------------------  CRUD Usuarios ----------------------------------------//


    public function ListarUsuarios(Request $request)
    {
      
      $usuarios=DB::table('users')
      ->where('fk_tipo_user',3)
      ->get();

    
      return view('admin.ListarUsuarios',compact('usuarios'));
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

    public function CrearUsers(){

          /*
        Users::create([
          'name'=>$request->nombre_empleado,
          'surname'=>$request->apellido_empleado,
          'rut'=>$request->rut_empleado,
          'email'=>$request->correo_empleado,
           'password'=>,
           'edad'=>,
           'fecha_nacimiento'=>,
           'telefono'=>,
           'estado'=>,
           'fk_tipo_user'=>,
        ]);

*/

    }


    //----------------------------------- Fin CRUD Usuarios ----------------------------------------//


    public function ventas(Request $request)
    {

      $Servicio=DB::table('servicios')->get()
      ->where('estado_servicios',1);

      // ->orderBy('desv', 'desc')

      $empleado=DB::table('empleados')->get()
      ->where('estado_empleado',1);
      
    
      return view('admin.ventas',compact('Servicio','empleado'));

    }


    public function enviarpago(Request $request)
    {

      //dd($request->all());

       $cantidad=$request->cantidad;
       $servicios=$request->servicios;
       $id_user=$request->User;

       
        $pago = DB::table('servicios')
        ->wherein('id_servicios',$request->servicios)
        ->get();

        $User = DB::table('users')
        ->where('id',$request->User)
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


       return view('admin.confirmarpago',compact('Serviciopaso','trabajador','date','empleado','User'));
 
    }


    public function confirmar(Request $request)
    {
      //dd($request->all());
      $ValidarVenta=DB::table('ventas')
      ->where('fk_usuario_venta',$request->id_user)
      ->where('fk_empleado_venta',$request->idempleado)
      ->where('fecha_venta',$request->fechaservicio)
      ->get();

      if($ValidarVenta->isNotEmpty()){

        Session::flash('error','La venta ya fue realizada');
        return redirect()->route('ventas');
        

      }else{

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
                $ValorServ=DB::table('servicios')
                ->select('valor_servicio')
                ->where('id_servicios','=',$tbpaso[$i]->id_servicio_paso)
                ->get();

                DB::table('detalle_ventas')->insert([
                  'cantidad_detalle_venta' => $tbpaso[$i]->cantidad_servicio_paso,
                  'fk_servicio_detall_venta'=> $tbpaso[$i]->id_servicio_paso,
                  'fk_venta_detall_venta'=> $ventas,
                  'valor_servicio_historico'=>$ValorServ[0]->valor_servicio
                  
        
                  ]);
        
                  
              }





            $Servicio=DB::table('servicios')->get()
            ->where('estado_servicios',1);


            $empleado=DB::table('empleados')->get()
            ->where('estado_empleado',1);

            
            Session::flash('success','Venta Realizada');

    
      // return view('admin.ventas',compact('Servicio','empleado'));
      //return view('Admin.ventas',compact('Servicio','empleado'));
        }
      return redirect()->route('ventas');

    }


    public function Reservas(Request $request) // index de la reserva 
    {

      // $Reserva=DB::table('reserva')
      // ->orderBy('id_reserva', 'desc')->get();

       $Reserva=reservas::with('Servicios','User','Empleado')->get();

     //dd($Reserva);
      //$user=$Reserva[0]->user;
    //dd($user);
      return view('admin.Reservas',compact('Reserva'));

    }


    public function Reservaspago($id_reserva){ // carga la recerva con el boton de pagar
      // dd($id_reserva);

      //$id_reserva=0;
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
      ->where('id_servicios','=',1)
      ->get();


   


     // dd($ServiciosReservados,$ServiciosNoReservados);
      // $Reserva=reservas::find($id_reserva);
      // $servicios=reservas::find($id_reserva)->servicios;
      // $User=reservas::find($id_reserva)->Users2;
      // dd($Reserva,$servicios,$User);



      return view('admin.PagoReserva',compact('Reserva','ServiciosReservados','ServiciosNoReservados'));

      
      //return view('admin.PagoReserva',compact('encabezado','detalle','cliente','trabajador','Servicio','id_reserva'));


      // $idreserva = $id_reserva;

      // $encabezado = DB::table('reservas')
      // ->where('id_reserva','=',$id_reserva)
      // ->get();


      // $detalle = DB::table('detalle_reserva')
      // ->where('fk_reserva','=',$id_reserva)
      // ->get();


      // $cliente = DB::table('users')
      // ->where('id','=',$encabezado[0]->fk_id_usuario)
      // ->get();

      // $trabajador = DB::table('empleados')
      // ->where('id_empleado','=',$encabezado[0]->fk_id_empleado)
      // ->get();

      // $Servicio=DB::table('servicios')->get()
      // ->where('estado_servicios',1);


      
    }


    public function enviarpagoreserva (Request $request){ // realizar el pago de la reserva 
      
       //dd($request->all());
      $id_reserva=$request->idreserva;
      $cantidad=$request->cantidad;
      $servicios=$request->servicios;

      $pago = DB::table('servicios')
      ->wherein('id_servicios',$request->servicios)
      ->get();



    
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
  
     // dd($Serviciopasoreserva,$trabajador, $date);

      return view('admin.confirmarpagoreserva',compact('Serviciopasoreserva','trabajador','date','id_reserva'));
    }

    public function confirmarventareserva(Request $request) // confirmar la reserva 
    {

      // dd($request->all());
      
      $confirmarReserva=DB::table('reservas')
      ->where('id_reserva',$request->id_RESERVA)
      ->where('estado_reserva','PENDIENTE')
      ->get();

      if($confirmarReserva->isEmpty()){

        Session::flash('error','Venta ya fue realizada');

        return redirect()->route('Reservas');



      }else{
           // dd('pos no ',$confirmarReserva);

        

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
     // return view('admin.ventas',compact('Servicio','empleado'));

     return redirect()->route('Reservas');

    }







    public function reporteventas (){
      
      return view('admin.ReportesVentas');
    }
    
    
    
    public function filtrarventas (Request $request){
      
      $fecha1=$request->fecha1;
      $fecha2=$request->fecha2;
      $porcentaje=DB::table('reporte_ventas')
      ->whereBetween('fecha_venta', array($request->fecha1,$request->fecha2))
      ->get();

  


      return view('admin.ReportesVentas',compact('porcentaje','fecha1','fecha2'));
    }




    public function reportecomosiones (){
      
      return view('admin.Reportescomisiones');
    }
    
    
    
    public function filtrarcomisiones (Request $request){
      
      $fecha1=$request->fecha1;
      $fecha2=$request->fecha2;
      $porcentaje=DB::table('reporte_comisiones')
      ->whereBetween('fecha_venta', array($request->fecha1,$request->fecha2))
      ->get();
  


      return view('admin.Reportescomisiones',compact('porcentaje','fecha1','fecha2'));
    }



    public function reporteservicios (){
      
      return view('admin.ReporteServicios');
    }
    
    
    
    public function filtrarservicios (Request $request){
      
      $fecha1=$request->fecha1;
      $fecha2=$request->fecha2;

       $porcentaje=DB::table('servicios')
      ->selectRaw('nombre_servicio as servicio,sum(valor_servicio_historico) as valor_servicio_historico,sum(cantidad_detalle_venta) as cantidad, sum(valor_servicio_historico) * sum(cantidad_detalle_venta) as total')
      ->join('detalle_ventas', 'detalle_ventas.fk_servicio_detall_venta', '=', 'servicios.id_servicios')
      ->join('ventas', 'ventas.id_ventas', '=', 'detalle_ventas.fk_venta_detall_venta')
      ->whereBetween(DB::raw('date(fecha_venta)'), array($request->fecha1,$request->fecha2))
      ->groupBy('nombre_servicio')
      ->get();
      
      // dd($porcentaje);
  


      return view('admin.ReporteServicios',compact('porcentaje','fecha1','fecha2'));
    }



//----------------------------------- CRUD Gastos ----------------------------------------//


    public function reportegastos (){
      
      return view('admin.ReporteGastos');
    }

    public function AgregarGastos (){
      
      return view('admin.AgregarGastos');
    }
    
    
    
    public function filtrargastos (Request $request){
      
      $fecha1=$request->fecha1;
      $fecha2=$request->fecha2;
      $gastos=DB::table('gastos')
      ->whereBetween('fecha_gastos', array($request->fecha1,$request->fecha2))
      ->get();
  


      return view('admin.ReporteGastos',compact('gastos','fecha1','fecha2'));
    }




    public function insertargastos(Request $request)
    {
        gastos::create([

            
            'descripcion_gastos' => $request->descripcion_gasto,
            'valor_gastos' => $request->valor_gasto,
            'fecha_gastos' => $request->fecha_gasto,


        ]);

        return redirect()->route('indexadmin');

    }

//-----------------------------------FIN CRUD Gastos ----------------------------------------//
    

    public function eliminarventas (){
      
      return view('admin.EliminarVentas');
    }

    public function eliminarventa (Request $request){

      // dd($request->all());

      $codigo=$request->codigo;

      $encabezado = DB::table('ventas')
        ->where('id_ventas',$codigo)
        ->get();

      // dd($encabezado);  
   

      $cliente = DB::table('users')
      ->where('id',$encabezado[0]->fk_usuario_venta)
      ->get();

      $trabajador = DB::table('empleados')
      ->where('id_empleado',$encabezado[0]->fk_empleado_venta)
      ->get();

      $servicios = DB::table('detalle_ventas')
      ->join('servicios', 'servicios.id_servicios', '=', 'detalle_ventas.fk_servicio_detall_venta')
      ->where('fk_venta_detall_venta',$codigo)
      ->get();

       

      
      
        return view('admin.EliminarVentas',compact('encabezado','cliente','trabajador','codigo','servicios'));
    }


    public function eliminarventafinal (Request $request){

      //  dd($request->all());

      $codigo=$request->cod;
      
      $update = DB::table('ventas')
      ->where('id_ventas',$codigo)
            ->update(['estado_venta' => 0]);
            

       $update = DB::table('detalle_ventas')
       ->where('fk_venta_detall_venta',$codigo)
        ->update(['estado_venta_detalle' => 0]);

      
        
      
      
        return view('admin.EliminarVentas');
    }

    public function infodesarrolladores (){
      
      return view('admin.informacion');
    }


    public function reporteventaseliminadas (){
      
      return view('admin.ReporteVentasEliminadas');
    }
    
    
    
    public function filtrarventaseliminadas (Request $request){
      
      $fecha1=$request->fecha1;
      $fecha2=$request->fecha2;
      $porcentaje=DB::table('reporte_ventas_eliminadas')
      ->whereBetween('fecha_venta', array($request->fecha1,$request->fecha2))
      ->get();

  


      return view('admin.ReporteVentasEliminadas',compact('porcentaje','fecha1','fecha2'));
    }




    public function reportecomosionestotal (){
      
      return view('admin.ReporteComisionesTotales');
    }
    
    
    
    public function filtrarcomisionestotal (Request $request){
      
      $fecha1=$request->fecha1;
      $fecha2=$request->fecha2;



      $consulta=DB::table('empleados')
      ->selectRaw('nombre_empleado,apellido_empleado,rut_empleado, comision_empleado, sum( ROUND(total_venta - total_venta * comision_empleado / 100,
      0)) AS comision_administrador, sum(ROUND(total_venta * comision_empleado / 100,
      0) )AS comision_empleados, sum(total_venta) as total')
      ->join('ventas', 'ventas.fk_empleado_venta', '=', 'empleados.id_empleado')
      // ->whereRaw('date(fecha_venta) Between '.$request->fecha1.' and '.$request->fecha2)
      ->whereBetween(DB::raw('date(fecha_venta)'), array($request->fecha1,$request->fecha2))
      ->groupBy('rut_empleado')
      ->get();
      

      // dd($consulta);
    


      return view('admin.ReporteComisionesTotales',compact('consulta','fecha1','fecha2'));
    }




    public function agregarservempleado($id_empleado){


      $id=$id_empleado;
      $empleados=DB::table('empleado_servicio_detalle')
      ->where('fk_empleado',$id_empleado)
      ->where('estado',1)
      ->join('empleados', 'empleados.id_empleado', '=', 'empleado_servicio_detalle.fk_empleado')
      ->join('servicios', 'servicios.id_servicios', '=', 'empleado_servicio_detalle.fk_servicio')
      ->get();

      // dd($empleados);

      $servicios=DB::table('servicios')
      ->where('estado_servicios',1)
      ->get();



      return view('admin.agregrarserdetalle',compact('empleados','servicios','id'));
       
      
    }


    public function eliminarservicioempleado(Request $request){

      $id_empleado=$request->id_trabajador;
      $lista=$request->case;

      $conteo=count($request->case);
      $conteo = $conteo-1;

      // dd($conteo);

      for ($i = 0; $i <= $conteo; $i++){
       $validar=DB::table('empleado_servicio_detalle')
        ->where('fk_empleado',$id_empleado)
        ->where('fk_servicio',$lista[$i])
        ->where('estado',1)
        ->get();

        if($validar->isNotEmpty()){
          $agregar = DB::table('empleado_servicio_detalle')
          ->where('fk_empleado',$id_empleado)
          ->where('fk_servicio',$lista[$i])
          ->update(['estado' => 0

  
          ]);
          
        }else{


        }
       

        }


      $empleados=DB::table('empleado_servicio_detalle')
      ->where('fk_empleado',$id_empleado)
      ->where('estado',1)
      ->join('empleados', 'empleados.id_empleado', '=', 'empleado_servicio_detalle.fk_empleado')
      ->join('servicios', 'servicios.id_servicios', '=', 'empleado_servicio_detalle.fk_servicio')
      ->get();
      

      $servicios=DB::table('servicios')
      ->where('estado_servicios',1)
      ->get();

      $id=$id_empleado;


     // return view('admin.agregrarserdetalle',compact('empleados','servicios','id'));
     return redirect()->route('agregarservempleado',$id_empleado);
      
    }


    public function agregarservicioempleado(Request $request){

        //dd($request->all());
      $id_empleado=$request->id_trabajador;
      $lista=$request->case;

      $conteo=count($request->case);
      $conteo = $conteo-1;


      for ($i = 0; $i <= $conteo; $i++){
       $validar=DB::table('empleado_servicio_detalle')
        ->where('fk_empleado',$id_empleado)
        ->where('fk_servicio',$lista[$i])
        ->get();

        if($validar->isEmpty()){
          $agregar = DB::table('empleado_servicio_detalle')
          ->insert(['fk_empleado' => $id_empleado,
                    'fk_servicio' => $lista[$i],
                    'estado' => 1 
  
          ]);

        }elseif($validar->isNotEmpty()){
          $agregar = DB::table('empleado_servicio_detalle')
          ->where('fk_empleado',$id_empleado)
          ->where('fk_servicio',$lista[$i])
          ->update(['estado' => 1  ]);
         
        }else{

          
       

        }
       

        }

      
      $empleados=DB::table('empleado_servicio_detalle')
      ->where('fk_empleado',$id_empleado)
      ->where('estado',1)
      ->join('empleados', 'empleados.id_empleado', '=', 'empleado_servicio_detalle.fk_empleado')
      ->join('servicios', 'servicios.id_servicios', '=', 'empleado_servicio_detalle.fk_servicio')
      ->get();

      $servicios=DB::table('servicios')
      ->where('estado_servicios',1)
      ->get();

        
      
      $id=$id_empleado;




      //return view('admin.agregrarserdetalle',compact('empleados','servicios','id'));
       
      return redirect()->route('agregarservempleado',$id_empleado);
      
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




    public function reportetotalesservicios(){



      return view('admin.Reporteserviciostotales');
       
      
    }


    public function reportetotalesserviciosfiltrar (Request $request){

      // dd($request->all());
      
      $fecha1=$request->fecha1;
      $fecha2=$request->fecha2;


      $consulta=DB::table('servicios')
      ->selectRaw('nombre_servicio ,sum(valor_servicio_historico) as valorserv')
      ->join('detalle_ventas', 'detalle_ventas.fk_servicio_detall_venta', '=', 'servicios.id_servicios')
      ->join('ventas', 'ventas.id_ventas', '=', 'detalle_ventas.fk_venta_detall_venta')
      ->whereBetween(DB::raw('date(fecha_venta)'), array($request->fecha1,$request->fecha2))
      ->groupBy('nombre_servicio')
      ->get();
      

      // dd($consulta);



      return view('admin.Reporteserviciostotales',compact('consulta','fecha1','fecha2'));
    }







    
    
}
