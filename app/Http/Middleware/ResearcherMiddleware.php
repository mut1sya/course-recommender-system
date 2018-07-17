<?php

namespace App\Http\Middleware;
use Auth;
// use App\Models\Researcher;
use Closure;

class ResearcherMiddleware
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
        if (Auth::check() && Auth::user()->role=='researcher' ) {
            return $next($request);  
        }  else{
        return redirect()->route('researcher.login');  
        }
     
    }
}
