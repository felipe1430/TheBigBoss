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
    //dd($request->all());
      $empleado = empleados::findOrfail($request->id_empleado);
      $empleado->id_empleado=$request->get('id_empleado');
      $empleado->nombre_empleado=$request->get('nombre_empleado');


      $empleado->update();
      return back();
    }


    
}
