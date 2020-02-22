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
    ->get(); // el 2 es solo barberos 
//dd($barberos);
    return view('Publico.index',compact('servicios','barberos'));

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
}
