<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if ($request->user() === null) {
            // return redirect('/')->with('status', 'You are not logged in!');
            // return response("Insufficient permissions", 401);

            return redirect('login');
        }
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if ($request->user()->hasAnyRole($roles) || !$roles) {
            return $next($request);
        }
        return redirect('login');
        // return response("Insufficient permissions", 401);
        // return redirect('status', 'Your session has expired. Please log in again.');
    }
}
