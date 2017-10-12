<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\User;

class CheckIfAdmin
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

        if (isset(Auth::user()->is_admin)) {
            if (! Auth::user()->is_admin){
                return redirect()->route('home');
            }
        }
        return $next($request);
    }
}
