<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = auth()->user();

        // Check if user has the role This check will depend on how your roles are set up
        if($user->hasRole($role)){
            return $next($request);
        }    


        return redirect()->route('management');
        
    }
}
