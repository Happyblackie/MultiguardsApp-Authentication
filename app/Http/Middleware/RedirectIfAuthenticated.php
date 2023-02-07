<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            
            //redirects specific authenticated user to home route by checking guard name
            if (Auth::guard($guard)->check()) {
               /*  return redirect(RouteServiceProvider::HOME);  */
                
               //step x v checking if guard is an admin guard
               if($guard === 'adm')
               {
                    return redirect()->route('adm.home');
               }
                //end of step x v checking if guard is an admin guard


                //part 3 g checking if guard is an admin guard
               if($guard === 'doctor')
               {
                    return redirect()->route('doctor.home');
               }
               
               return redirect()->route('user.home'); /* step k  */
            }
        }

        return $next($request);
    }
}
