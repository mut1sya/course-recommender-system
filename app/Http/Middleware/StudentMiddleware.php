<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
// use App\Models\Student;

class StudentMiddleware
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
        if (Auth::check() && Auth::user()->role=='student' ) {
            return $next($request);
        } else{
            return redirect()->route('student.login');
        }
     

    }
        
    
}
