<?php

namespace App\Http\Controllers\Publico;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\empleados;
class PublicoController extends Controller
{
    public function index()
    {
    
    $servicios=DB::table('servicios')->get()
    ->where('estado_servicios',1);

    $barberos = empleados::where('fk_empleado_tipo_user',2)
    ->where('estado_empleado',1)
    ->get(); 

    return view('Publico.index',compact('servicios','barberos'));

    }




    public function servicios()
    {
        $servicios=DB::table('servicios')->get()
        ->where('estado_servicios',1);
        // dd($servicios);
    
      return view('Publico.servicios',compact('servicios'));



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
}
