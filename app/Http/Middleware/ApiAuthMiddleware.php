<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthMiddleware
{
	public function handle(Request $request, Closure $next)
	{
		if (Auth::guard('api')->user()) return $next($request);

		return response([
			'status' => 'Error',
			'Message' => 'Invalid Bearer Token',
			'Status code' => 403
		], 403);
	}
}
