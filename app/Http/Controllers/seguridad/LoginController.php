<?php

namespace App\Http\Controllers\seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    //protected $redirectTo = '/Admin';

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


    protected function authenticated(Request $request, $user)
    {
       // dd($user);
        
        if ($user->fk_tipo_user == null || $user->estado== 0) {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('/Login')->withErrors(['error'=>'Este usuario no tiene cargo asignado o esta deshabilitado ']);
        }else{
            $user->setSession();
            
       

        }
  
    }


    public function redirectPath()
    {
        
        
        
        if( session()->get('tipo_usuario') == 1){

            return '/admin';


        }elseif(session()->get('tipo_usuario') == 2){

            return '/barberos';
        }elseif(session()->get('tipo_usuario') == 3){

            return '/Reservas/CalendarioReservas';
        
         }elseif(session()->get('tipo_usuario') == 5){

            return '/admin';
         }

        
    
        /*
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
        */
    }

    
}
