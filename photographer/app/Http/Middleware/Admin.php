<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use DB;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if ($user && $user->status == 'admin') {
            return $next($request);
        }
        abort(403);
    }

}
