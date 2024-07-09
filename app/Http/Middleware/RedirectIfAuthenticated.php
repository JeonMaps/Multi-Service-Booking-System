<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Get the current subdomain
                $subdomain = explode('.', $request->getHost())[0];

                // Redirect to the appropriate URL based on the subdomain
                switch ($subdomain) {
                    case 'admin':
                        return redirect('/admin/home');
                        break;
                    case 'business':
                        return redirect('/business/home');
                        break;
                    default:
                        return redirect('/home');
                }
            }
        }

        return $next($request);
    }
}
