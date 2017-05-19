<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response;

class Timezone{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( Auth::user() ){
            //\config(['app.timezone' => Auth::user()->timezone]);
            \date_default_timezone_set ( Auth::user()->timezone );
        }
        return $next($request);
    }
}