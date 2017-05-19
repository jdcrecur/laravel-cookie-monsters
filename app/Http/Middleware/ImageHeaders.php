<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class ImageHeaders{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('cache-control' , 'max-age=604800, public');

        return $response;
    }
}