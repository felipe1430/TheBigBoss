<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\empleados;
use App\servicios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    

  public function index(){
      return view('admin.index');
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

    //----------------------------------- FIN CRUD SERVICIOS ----------------------------------------//


    
}
