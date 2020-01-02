<?php

namespace App\Http\Controllers\Cajero;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CajeroController extends Controller
{

    public function index(){

        return view('cajero.index');
    }



}
