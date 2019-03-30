<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;

class Admin
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
        if (auth()->user()->role_id != 1) {
            // return response('you shall not pass!',403); //retorno un mensaje y el código de error, que es el 403:http_forbidden
            //return response('you shall not pass!',Response); // puedo usar en lugar del codigo de error el alias Response def en app.php
            // return response()->view('errors.403', [], 403);
            throw new AuthorizationException();
        }
        return $next($request);
    }
}
