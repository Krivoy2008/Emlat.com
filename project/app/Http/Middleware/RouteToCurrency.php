<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;

class RouteToCurrency {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $redirection=$request->fullUrl();

        if(!preg_match('/converter/',$redirection)){
            $redirection.='/converter';
            return new RedirectResponse($redirection, 307);
        }

        else
        return $next($request);
	}

}
