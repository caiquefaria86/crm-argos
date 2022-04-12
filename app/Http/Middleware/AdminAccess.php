<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() AND Auth::User()->admin){
            return $next($request);
        }

        // dd("você não é um administrador");
        Alert('Autorização','Você não é administrador para acessar esta pagina.', 'error');
        return redirect(Auth::user()->redirect_to_page);

    }
}
