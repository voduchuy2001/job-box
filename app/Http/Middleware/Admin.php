<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() && Auth::user()->role !== UserRole::Admin) {
            toast(__('Access Denied'), 'danger');
            abort(403);
        }
        return $next($request);
    }
}
