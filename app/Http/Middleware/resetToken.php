<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;

class resetToken
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
        $token = $request->token;

        $passToken = DB::table('password_resets')->where(['token' => $token])->get();

        if(!$passToken->isEmpty()){
            return $next($request);
        }

        return redirect()->route('home');
    }
}
