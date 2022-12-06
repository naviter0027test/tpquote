<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class CheckMemberLoginMiddle
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
        if(Session::has('member') == true) {
            if($request->path() == 'member/login' || $request->path() == '/')
                return redirect('/member/home');
            return $next($request);
        } else if($request->path() == 'member/login') {
            return $next($request);
        }
        return redirect('/member/login');
    }
}
