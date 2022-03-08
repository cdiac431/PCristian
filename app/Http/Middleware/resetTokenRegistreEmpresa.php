<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;

class resetTokenRegistreEmpresa
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
        

        $passToken = DB::table('empresa_validacions')->where(['token' => $token])->get();



        if(!$passToken->isEmpty()){
            $request['id_empresa'] = $passToken->first()->id_empresa;
            //exit(strval());
            return $next($request);
            //return redirect()->route('home');
        }

        return redirect()->route('home');
    }
}
