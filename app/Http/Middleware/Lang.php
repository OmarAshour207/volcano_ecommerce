<?php

namespace App\Http\Middleware;

use Closure;

class Lang
{

    public function handle($request, Closure $next)
    {
        app()->setlocale(session('lang', config('app.locale')));
        return $next($request);
    }
}
