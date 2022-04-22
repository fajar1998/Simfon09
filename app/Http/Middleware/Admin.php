<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{

    public function handle(Request $request, Closure $next)
    {
        $notification = array(
            'message' => 'Tidak Ada Hak Akses ',
            'alert-type' => 'warning'
        );

        if (auth()->user()->hak_akses == 1 || auth()->user()->hak_akses == 2) {
            return $next($request);
        }
        return redirect()->back()->with($notification);
    }
}
