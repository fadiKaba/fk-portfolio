<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class OwnerMiddleware
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
        if($request->route('userId') == Auth::id()){
            return $next($request);
        }else{
            return 'not allowed';
        }
        
    }
}
