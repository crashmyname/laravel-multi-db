<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SetDatabaseConnection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $vendor = $user->vendor;

            // Mengatur koneksi ke database vendor
            config(['database.connections.mysql.database' => 'db_'.$vendor]);
            DB::purge('mysql'); // Menghapus koneksi yang ada
            DB::reconnect('mysql'); // Menghubungkan kembali dengan pengaturan baru
        }

        return $next($request);
    }
}
