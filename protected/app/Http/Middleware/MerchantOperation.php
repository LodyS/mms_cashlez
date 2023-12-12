<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;

class MerchantOperation
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->privilege_user_id == '27'):
            return $next($request);
        endif;

        abort(403);
    }
}
