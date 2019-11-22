<?php

namespace App\Http\Controllers\seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
   // protected $redirectTo = '/home';

   use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){

        return view('seguridad.index');
    }

    public function username()
    {
        return 'email';
    }



}
