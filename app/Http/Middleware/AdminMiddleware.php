<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check())
            return redirect('login');

        if ($this->isAdmin()){
            return $next($request);
        }

        return redirect('/dashboard ');
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return DB::table("users")->where(['id' => Auth::id(), 'is_admin' => '1'])->exists();
    }
}
