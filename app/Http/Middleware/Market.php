<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Market
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, $next)
    {

        if(auth()->guard('market')->check()) {

/*            Session::put("giren_kisi","market");*/

            return $next($request);
        }
        return "basarısız";

    }
}
