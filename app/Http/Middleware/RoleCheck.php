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
        
        /*
        if ($request->input('token') !== 'my-secret-token') {
            return redirect('home');
        }
 
        return $next($request);
        */
        /*()
        $user = User::role('writer')->get();

        if ( ){
            echo 'asdasd ';
        } 

        return $next($request);
        */

        $response = $next($request);
        
        /*
        if(Auth::user()->hasRole('Warga') && Auth::user()->status_akun == 1){
            return redirect('mandiri');
        }
        */
        /*
Role::create(['name' => 'super-admin']);
Role::create(['name' => 'student']);
Role::create(['name' => 'teacher']);
        */

        if (Auth::user()->hasRole('super-admin')){
            return redirect('supe');
        }
        
        elseif (Auth::user()->hasRole('student')){
            return redirect('student');

        }
        elseif (Auth::user()->hasRole('teacher')){
            return redirect('teacher');
        }
        else{
            return redirect('norole');
        }

        return $response;
    }
}

/*
$response = $next($request);
        
if (Auth::user()->hasRole('super-admin')){
    return redirect('supe');

}elseif (Auth::user()->hasRole('student')){
        return redirect('student');

} else {
    return redirect('norole');
}

return $response;
}
*/