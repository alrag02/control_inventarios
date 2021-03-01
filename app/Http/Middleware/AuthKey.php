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
        $token = $request->header('APPKEY');
        if($token != config('app.key')){
            return response()->json(['message' => 'Acceso no autorizado'], 401);
        }
        return $next($request);
    }
}
