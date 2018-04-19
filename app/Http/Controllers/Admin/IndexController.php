<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 后台首页控制器
 */
class IndexController extends Controller
{
    /**
     * 后台首页视图
     * 
     * @return [type] [description]
     */
    public function index()
    {
        return view('admin.index');
    }

    public function logout(Request $request)
    {
        session(['admin' => null]);

        return redirect()->route('admin.login');
    }
}
