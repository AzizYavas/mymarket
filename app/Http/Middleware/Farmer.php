<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Farmer
{
    public static function where(string $string, $id)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, $next)
    {
        if(auth()->guard('farmer')->check()) {

/*            Session::put("giren_kisi","farmer");*/

            return $next($request);
        }
        return "basarısız";
    }
}
