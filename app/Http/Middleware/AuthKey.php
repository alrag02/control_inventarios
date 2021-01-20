<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthKey
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
        $token = $request->header('APP_KEY');
        if($token != env("APP_KEY")){
            return response()->json(['message' => 'No se encontró la App Key'], 401);
        }
        return $next($request);
    }
}
