<?php

namespace App\Http\Middleware;

use App\Enums\UserType;
use Closure;

class AdminAndCustomer
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
        if ($request->user()->role == UserType::Admin) {
            return $next($request);
        }
        if ($request->user()->role == UserType::Customer) {
            return $next($request);
        }
        abort(403, "Доступ только для Admin и Customer");
    }
}