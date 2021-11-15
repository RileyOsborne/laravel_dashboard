<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;


class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$this->isAdmin($request)) {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }

    protected function isAdmin($request)
    {
        // Write your logic to check if the user us admin.

        // something like
        return $request->user()->email == 'admin@admin.com';
    }
}
