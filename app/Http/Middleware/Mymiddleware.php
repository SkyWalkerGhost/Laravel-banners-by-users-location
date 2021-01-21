<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Mymiddleware
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
        if($request->route('page') != 'page')
        {
            return redirect()->route('welcome');
        }

        return $next($request);
    }
}
