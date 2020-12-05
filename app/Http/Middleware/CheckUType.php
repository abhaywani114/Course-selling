<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use \Auth;

class CheckUType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $type)
    {
        if (empty(Auth::User()))
            abort(403);

        if ($type == 'admin') {
            if (Auth::User()->type != 'admin') {
                abort(403);
            }
        }

       if ($type == 'user') {
            if (Auth::User()->type != 'user') {
                abort(403);
            }
        }

        return $next($request);
    }
}
