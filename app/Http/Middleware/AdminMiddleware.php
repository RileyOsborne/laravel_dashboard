<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;


class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (! $this->isAdmin($request)) 
        {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }

    protected function isAdmin($request)
    {
        //logic to verify the logged in user is an admin
        return $request->user()->email == 'admin@admin.com';
    }
}
