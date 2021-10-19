<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
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
        try {
            $user= JWTAuth::parseToken()->authenticate();
        }catch (\Throwable $e){
            if ($e instanceof TokenInvalidException){
                return response()->json(["msg"=>"invalid Token"]);
            }
            if ($e instanceof TokenExpiredException){
                return response()->json(["msg"=>"token is expired"]);
            }
            return response()->json(["msg"=>"token not found"]);
        }
        return $next($request);
    }
}
