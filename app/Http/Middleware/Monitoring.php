<?php

namespace App\Http\Middleware;

use Closure;

class Monitoring
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
        if($request->user()->level !=1){
            return redirect ('/dashboard');
        }
        return $next($request);
    }
}
