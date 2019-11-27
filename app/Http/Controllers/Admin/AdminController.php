<?php

namespace App\Http\Controllers\Admin;

use DB;
 use App\empleados;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    

  public function index(){
      return view('admin.index');
  }  

    public function ListarEmpleados(Request $request)
    {
      
      $empleados=DB::table('empleados')
      ->join('tipo_user', 'tipo_user.id_tipo_user', '=', 'empleados.id_empleado')
      ->get();

      $tipouser=DB::table('tipo_user')
      ->get();
     
      
    
      return view('Admin.ListarEmpleados',compact('empleados','tipouser'));
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
      $empleado->estado_empleado=$request->get('Estado');
      $empleado->update();
      return back();
    }



    public function ListarServicios(Request $request)
    {
      
      $Servicio=DB::table('servicios')->get();

    
      return view('Admin.ListarServicios',compact('Servicio'));
    }

    public function actualizarservicios(Request $request)
    {
      // dd($request->all());
      $servicio = empleados::findOrfail($request->id_servicios);
      $servicio->id_servicios=$request->get('id_servicios');
      $servicio->nombre_servicio=$request->get('nombre_servicio');
      $servicio->descripcion_servicio=$request->get('descripcion_servicio');
      $servicio->valor_servicio=$request->get('valor_servicio');
      $servicio->estado_servicios=$request->get('estado_servicios');
      $empleado->update();
      return back();
    }


    
}
