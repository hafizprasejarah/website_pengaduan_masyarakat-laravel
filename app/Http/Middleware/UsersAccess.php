<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use auth;

class UsersAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\RedirectResponse)  $next
     * @param \Illuminate\Http\Request $request
     * 
     */
    public function handle(Request $request, Closure $next,$userrole)
    {
        if (auth()->user()->role == $userrole) {
            return $next($request);
        }

        return back()->with('error', 'You dont have permission to access for this page');

    }
}
