<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            /* return route('login'); */

            //step x v checking if route has admin prefix
            if($request->routeIs('adm.')){
                return route('adm.login');
            }
             //end of   step x v

            //part 3 h checking if route has admin prefix
            if($request->routeIs('doctor.')){
                return route('doctor.login');
            }
            

            return route('user.login'); /* step k */
        }
    }
}
