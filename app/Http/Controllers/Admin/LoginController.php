<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Validator;
use Illuminate\Support\Facades\Hash;

/**
 * 后台登陆控制器
 */
class LoginController extends Controller
{
    /**
     * 登录视图
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function login(Request $request)
    {
        return view('admin.login');
    }

    /**
     * 登录表单处理
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function doLogin(Request $request)
    {
        $input = $request->input();

        Validator::make($input, [
            'username' => ['required', 'max:50'],
            'password' => ['required', 'max:255'],
        ], [
            'username.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
            'username.max' => '用户名不能超过:max个字符',
            'password.max' => '密码不能超过:max个字符'
        ])->validate();

        $admin = Admin::where('username', $input['username'])->first();
        if (!$admin || !Hash::check($input['password'], $admin->password)) {
            return back()->withErrors('账号或密码有误');
        }

        session(['admin' => $admin]);

        return redirect('admin');
    }
}
