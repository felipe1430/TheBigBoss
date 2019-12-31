<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //dd(Auth::guard($guard)->check());
        if (Auth::guard($guard)->check()) {
            dd(Auth::user()->fk_tipo_user);
            
            if(Auth::user()->fk_tipo_user==1){
                return redirect('/admin');

            }elseif(Auth::user()->fk_tipo_user==2){
                return redirect('/barberos');

            }elseif(Auth::user()->fk_tipo_user==3){
                return redirect('/Reservas/CalendarioReservas');

            }else{
                return redirect('/');
            }
           
        }

        return $next($request);
    }
}
