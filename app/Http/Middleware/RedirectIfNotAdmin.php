<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class RedirectIfNotAdmin
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
        if(!auth()->user()->hasRole('administrator'))
        {
            Session::flash('message_warning', 'Sorry, you are not allwoed to perform this task!'); 
            return redirect('/home');
        }
        return $next($request);
    }
}
