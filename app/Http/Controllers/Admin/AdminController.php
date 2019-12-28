<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\empleados;
use App\User;
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
        $date = $date->format('d-m-Y');

        $compras=DB::table('ventas')
        ->count('id_ventas');

        $registros=DB::table('users')
        ->count('id');
        


      return view('admin.index',compact('date','compras','registros'));


  }  

  //----------------------------------- CRUD EMPLEADOS ----------------------------------------//

    public function ListarEmpleados(Request $request)
    {
      
      $empleados=DB::table('empleados')
      ->join('tipo_user', 'tipo_user.id_tipo_user', '=', 'empleados.fk_empleado_tipo_user')
      ->get();

      
    
      return view('Admin.ListarEmpleados',compact('empleados'));
    }

    public function agregarempleado()
    {
      
      return view('Admin.AgregarEmpleados');
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

        return view('Admin.ListarEmpleados',compact('empleados'));

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

//----------------------------------- FIN CRUD EMPLEADOS ------------------------------------//


//----------------------------------- CRUD SERVICIOS ----------------------------------------//
    public function ListarServicios(Request $request)
    {
      
      $Servicio=DB::table('servicios')->get();

    
      return view('Admin.ListarServicios',compact('Servicio'));
    }

    public function agregarservicios()
    {
      
      return view('Admin.AgregarServicios');
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

        return view('Admin.ListarServicios',compact('Servicio'));

    }

    //-----------------------------------  CRUD Usuarios ----------------------------------------//


    public function ListarUsuarios(Request $request)
    {
      
      $usuarios=DB::table('users')->get();

    
      return view('Admin.ListarUsuarios',compact('usuarios'));
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


    //----------------------------------- CRUD Usuarios ----------------------------------------//


    public function ventas(Request $request)
    {

      $Servicio=DB::table('servicios')->get()
      ->where('estado_servicios',1);

      // ->orderBy('desv', 'desc')

      $empleado=DB::table('empleados')->get()
      ->where('estado_empleado',1);
      
    
      return view('Admin.ventas',compact('Servicio','empleado'));

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


       return view('Admin.confirmarpago',compact('Serviciopaso','trabajador','date','empleado'));
 
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

    
      return view('Admin.ventas',compact('Servicio','empleado'));

    }


    public function Reservas(Request $request)
    {

      $Reserva=DB::table('reserva')
      ->orderBy('id_reserva', 'desc')->get();
      
    
      return view('Admin.Reservas',compact('Reserva'));

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




      return view('Admin.PagoReserva',compact('encabezado','detalle','cliente','trabajador','Servicio','id_reserva'));
        
      
    }


    public function enviarpagoreserva (Request $request){
      
      dd($request->all());
  


      // return view('Admin.confirmarpagoreserva');
    }







    public function reporteventas (){
      
      return view('Admin.ReportesVentas');
    }
    
    
    
    public function filtrarventas (Request $request){
      
      $fecha1=$request->fecha1;
      $fecha2=$request->fecha2;
      $porcentaje=DB::table('reporte_ventas')
      ->whereBetween('fecha_venta', array($request->fecha1,$request->fecha2))
      ->get();

  


      return view('Admin.ReportesVentas',compact('porcentaje','fecha1','fecha2'));
    }




    public function reportecomosiones (){
      
      return view('Admin.Reportescomisiones');
    }
    
    
    
    public function filtrarcomisiones (Request $request){
      
      $fecha1=$request->fecha1;
      $fecha2=$request->fecha2;
      $porcentaje=DB::table('reporte_comisiones')
      ->whereBetween('fecha_venta', array($request->fecha1,$request->fecha2))
      ->get();
  


      return view('Admin.Reportescomisiones',compact('porcentaje','fecha1','fecha2'));
    }



    public function reporteservicios (){
      
      return view('Admin.ReporteServicios');
    }
    
    
    
    public function filtrarservicios (Request $request){
      
      $fecha1=$request->fecha1;
      $fecha2=$request->fecha2;
      $porcentaje=DB::table('reporte_servicios')
      ->whereBetween('fecha_venta', array($request->fecha1,$request->fecha2))
      ->get();
  


      return view('Admin.ReporteServicios',compact('porcentaje','fecha1','fecha2'));
    }



//----------------------------------- CRUD Gastos ----------------------------------------//


    public function reportegastos (){
      
      return view('Admin.ReporteGastos');
    }

    public function AgregarGastos (){
      
      return view('Admin.AgregarGastos');
    }
    
    
    
    public function filtrargastos (Request $request){
      
      $fecha1=$request->fecha1;
      $fecha2=$request->fecha2;
      $gastos=DB::table('gastos')
      ->whereBetween('fecha_gastos', array($request->fecha1,$request->fecha2))
      ->get();
  


      return view('Admin.ReporteGastos',compact('gastos','fecha1','fecha2'));
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
    

    
}
