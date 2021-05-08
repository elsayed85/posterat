<?php

namespace App\Http\Middleware;
use Barryvdh\Debugbar\Facade as Debugbar;
use Closure;
use Illuminate\Support\Facades\Config;

class SetDebug
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
        if(session('debug')){
            Config::set('app.debug',true);
            try{
                Debugbar::enable();
            } catch(\Exception $ex) {
                return $ex->getMessage();

            }

        }
        return $next($request);
    }
}
