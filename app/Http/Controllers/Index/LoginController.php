<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;

/**
 * 前台登陆控制器
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
        return view('index.login');
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

        $user = User::where('username', $input['username'])->first();
        if (!$user || !Hash::check($input['password'], $user->password)) {
            return back()->withErrors('账号或密码有误');
        }

        session(['user' => $user]);

        return redirect('index');
    }
}
