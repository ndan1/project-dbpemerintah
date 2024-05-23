<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsurePegawaiIsAuthenticated
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
        if (!Auth::check()) {
            return redirect()->route('adminlogin');
        }

        // if (Auth::guard('pegawai')->check()){
        //     return redirect()->intended(route('adminhome'));
        // }

        if (Auth::user()->role !== 'pegawai') {
            return redirect()->route('home'); // atau ke halaman lain sesuai kebutuhan Anda
        }

        return $next($request);
    }
}
