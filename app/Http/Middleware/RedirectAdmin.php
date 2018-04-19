<?php

namespace App\Http\Middleware;

use Closure;

/**
 * 后台路由重定向
 *
 */
class RedirectAdmin
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
        if (session('admin') == null) { // 未登录
            return redirect()->route('admin.login');            
        }

        return $next($request);
    }
}
