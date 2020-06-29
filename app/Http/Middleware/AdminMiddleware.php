<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AdminMiddleware
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    public function handle($request, Closure $next)
    {
        if ($this->auth->getUser()->role_id == 1)
        {
            return $next($request);
        }
        abort(403, 'Unauthorized action.');
    }
}
