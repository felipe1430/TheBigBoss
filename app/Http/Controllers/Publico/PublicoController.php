<?php

namespace App\Http\Controllers\Publico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicoController extends Controller
{
   public function index(){
       return view('Publico.prueba');
   }
}
