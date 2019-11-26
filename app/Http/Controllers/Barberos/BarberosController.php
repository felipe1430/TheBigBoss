<?php

namespace App\Http\Controllers\Barberos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarberosController extends Controller
{
    public function index(){
        return view('barberos.index');
    }
}
