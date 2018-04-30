<?php

namespace App\Http\Middleware;

use Closure;

/**
 * 使用 Entrust 构建的后台 RBAC
 */
class EntrustRbac
{
    private $admin = null; // 已登录的管理员model实例

    public function __construct()
    {
        return $this->admin = session('admin');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->is('*delete')) { // 仅允许"admin"账号或"admin"角色或有"删除"权限的人执行"删除"操作
            if ($this->admin->username == 'admin'
            || $this->admin->hasRole('admin')
            || $this->admin->can('*delete')) {
                return $next($request);
            } else {
                return $this->refuseAccess($request);
            }
        } else if ($request->is('*user*')) { // 仅允许"admin"账号或"admin"角色或有"用户"相关权限的人访问"用户管理"模块
            if ($this->admin->username == 'admin'
            || $this->admin->hasRole('admin')
            || $this->admin->can('*user*')) {
                return $next($request);
            } else {
                return $this->refuseAccess($request);
            }
        } else if ($request->is('*entrust*')) { // 仅允许"admin"账号或"admin"角色访问”管理员管理“模块
            if ($this->admin->username == 'admin'
            || $this->admin->hasRole('admin')) {
                return $next($request);
            } else {
                return $this->refuseAccess($request);
            }
        } else {
            return $next($request);
        }
    }

    /**
     * 响应：拒绝访问
     */
    public function refuseAccess($request)
    {
        if ($request->ajax()) {
            return response()->json([
                'code' => '403',
                'msg' => '对不起，您没有该权限',
                'data' => '',
                'url' => ''
            ]);
        } else {
            return app()->abort(403);
        }
    }
}
