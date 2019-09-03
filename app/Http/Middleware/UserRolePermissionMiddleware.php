<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserRolePermissionMiddleware
{
    public function handle($request, Closure $next)
    {

        if (Auth::user()->hasPermissionTo('All Access')) {
            return $next($request);
        }

        if ($request->is('GamesEntry/create') || $request->is('Admin/create')
            || $request->is('TeamNameEntry/create')
        ) {
            if (!Auth::user()->hasPermissionTo('Create')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        return $next($request);
    }
}
