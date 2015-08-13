<?php namespace App\Http\Middleware;

use Closure;
use Redirect;

class RedirectAdminIfStaff {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($request->user()) {
	        if ($request->user()->role == "admin" || $request->user()->role == "author") return Redirect::route("admin");
	        else return App::abort(404);
	    }
		
		return $next($request);
	}

}
