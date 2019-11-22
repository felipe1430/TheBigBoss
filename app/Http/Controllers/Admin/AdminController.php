<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    public function index()
    {

    return view('Publico.index');

    }

    public function servicios()
    {

    return view('Publico.servicios');

    }

    public function galeria()
    {

    return view('Publico.galeria');

    }

    public function blog()
    {

    return view('Publico.blog');

    }

    public function blogsimple()
    {

    return view('Publico.blogsimple');

    }

    public function about()
    {

    return view('Publico.about');

    }


    public function ListarEmpleados(Request $request)
    {
      
      $empleados=DB::table('empleados')
      ->join('tipo_user', 'tipo_user.id_tipo_user', '=', 'empleados.id_empleado')
      ->get();
     
      
    
      return view('Admin.ListarEmpleados',compact('empleados'));
    }

    
}
