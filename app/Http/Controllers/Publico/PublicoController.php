<?php

namespace App\Http\Controllers\Publico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicoController extends Controller
{
    public function index()
    {

    return view('Publico.index');

    }

    public function se()
    {

    return view('seguridad.se');

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
