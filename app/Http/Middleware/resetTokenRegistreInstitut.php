<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;

class resetTokenRegistreInstitut
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
        

        $passToken = DB::table('institut_validacions')->where(['token' => $token])->get();

        if(!$passToken->isEmpty()){
            $request['id_institut'] = $passToken->first()->id_institut;
            return $next($request);
        }
        
        return redirect()->route('home');
    }
}
