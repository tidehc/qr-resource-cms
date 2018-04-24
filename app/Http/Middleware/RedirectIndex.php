<?php

namespace App\Http\Middleware;

use Closure;

/**
 * 前台路由重定向
 */
class RedirectIndex
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
        if (session('user') == null) { // 未登录
            return redirect()->route('index.login');            
        }

        return $next($request);
    }
}
