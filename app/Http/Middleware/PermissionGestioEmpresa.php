<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermissionGestioEmpresa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        $user = auth()->user();

        if($user->hasPermissionTo($permission)){
            return $next($request);
        }

        return redirect()->route('management');    }
}
