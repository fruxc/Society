<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    public function handle($request, Closure $next, $guard = null)
    {
      switch ($guard) {
        case 'admin':
          if (Auth::guard($guard)->check() && $request=='admin.dashboard') {
            return redirect()->route('admin.dashboard');
          }
          if (Auth::guard($guard)->check() && $request=='admin.maintenance') {
            return redirect()->route('admin.maintenance');
          }
          if (Auth::guard($guard)->check() && $request=='admin.complaint') {
            return redirect()->route('admin.complaint');
          }
          if (Auth::guard($guard)->check() && $request=='admin.users') {
            return redirect()->route('admin.user');
          }
          if (Auth::guard($guard)->check() && $request=='createp.create') {
            return redirect()->route('payment.create');
          }

          break;
        default:
          if (Auth::guard($guard)->check()) {
              return redirect('/home');
          }
          break;
      }
      return $next($request);
    }
}
