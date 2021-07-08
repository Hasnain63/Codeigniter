<?php

namespace App\Http\Middleware;

use Session;
use Illuminate\Database\Schema\Builder;
use Closure;


class LogData
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

        // print_r((session()->get('LogData')));
        // die;
        if (session()->get('LogData') && session()->get('Token')) {
            return $next($request);
        }
        return redirect('/');
    }
}