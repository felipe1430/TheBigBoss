<?php

namespace App\Http\Controllers\Admin;

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

    
}
