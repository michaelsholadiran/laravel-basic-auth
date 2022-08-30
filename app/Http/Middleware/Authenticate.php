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
         if ($request->is('superadmin') || $request->is('superadmin/*')) {
                  return route('login',['role'=> 'superadmin']);
            }
            if ($request->is('subadmin') || $request->is('subadmin/*')) {
                  return route('login',['role'=> 'subadmin']);
            }
            if ($request->is('user') || $request->is('user/*')) {
                  return route('login',['role'=> 'user']);
            }
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
