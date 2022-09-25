<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
Use Models\Users;


class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        $response = $next($request);

        if (Auth::user()->hasRole('super-admin')){
            return redirect('supe');
        } 
        elseif (Auth::user()->hasRole('student')){
            return redirect('student');

        } elseif (Auth::user()->hasRole('teacher')){
            return redirect('teacher');
        
        } else {
            return redirect('norole');
        }

        return $response;
    }
}

