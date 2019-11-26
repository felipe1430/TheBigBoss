<?php

namespace App\Http\Middleware;

use Closure;

class SeguridadBarberos
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->permiso()) {
        return $next($request);
    }
     
    return redirect('/')->with('mensaje','No tiene los permisos para entrar a esta pagina');

    
    }



    private function permiso(){
        return session()->get('tipo_usuario') == 2;
    }
}

