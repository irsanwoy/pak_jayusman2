<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
{
    /** @var User $user */
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in.');
    }

    // Periksa apakah pengguna sudah di dashboard yang benar
    if ($user->hasRole('Admin') && !$request->routeIs('dashboard.admin')) {
        return redirect()->route('dashboard.admin');
    } elseif ($user->hasRole('Kasir') && !$request->routeIs('dashboard.kasir')) {
        return redirect()->route('dashboard.kasir');
    } elseif ($user->hasRole('Supervisor') && !$request->routeIs('dashboard.supervisor')) {
        return redirect()->route('dashboard.supervisor');
    } elseif ($user->hasRole('Manajer Toko') && !$request->routeIs('dashboard.manajer')) {
        return redirect()->route('dashboard.manajer');
    } elseif ($user->hasRole('Gudang') && !$request->routeIs('dashboard.gudang')) {
        return redirect()->route('dashboard.gudang');
    }

    // Jika role tidak dikenali
    if (!$request->routeIs('dashboard')) {
        return redirect()->route('dashboard')->with('error', 'Role not recognized.');
    }

    return $next($request);
}

}
