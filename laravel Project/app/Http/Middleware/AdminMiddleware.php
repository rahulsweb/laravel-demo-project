<?php

namespace App\Http\Middleware;

use Closure;
use Response;
use Auth;
class AdminMiddleware
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
        if ( ! Auth::check()) {
            abort(403, 'Unauthorized action.');
        }
        if ( $request->user()->roles[0]->name != 'customer')
        {
            return $next($request);
        }
     
    }
}
