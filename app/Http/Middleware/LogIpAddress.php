<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Illuminate\Http\Request;

class LogIpAddress
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ipAddress = $request->ip();
        $visitor = Visitor::where('ip_address', $ipAddress)->first();

        if (!$visitor) {
            // Jika pengunjung belum terdaftar, tambahkan ke database
            $visitor = Visitor::create([
                'ip_address' => $ipAddress,
                'hits' => 1,
            ]);
        } else {
            // Jika pengunjung sudah terdaftar, tingkatkan jumlah hits
            $visitor->increment('hits');
        }
        return $next($request);
    }
}
