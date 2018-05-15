<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Validator;
use Illuminate\Support\Facades\Hash;

/**
 * 前台用户中心控制器
 */
class IndexController extends Controller
{
    /**
     * 用户中心视图
     * 
     * @return [type] [description]
     */
    public function index()
    {
        return view('index.index');
    }

    /**
     * 更新个人信息
     */
    public function updateProfile(Request $request)
    {
        $input = $request->input();

        Validator::make($input, [
            'phone' => ['nullable', 'regex:/^1[3|4|5|6|7|8][0-9]{9}$/'],
            'memo' => ['nullable', 'max:255'],
        ], [
            'phone.regex' => '手机号格式不符',
            'memo.max' => '备注不能超过:max个字符',
        ])->validate();

        $admin = User::find(session('admin')->id);
        $admin->username = $input['username'] ?: '';
        $admin->email = $input['email'] ?: '';
        $admin->phone = $input['phone'] ?: '';
        $admin->memo = $input['memo'] ?: '';

        if ($admin->save()) {
            session(['admin' => $admin]); // 更新session
            return redirect('admin/profile')->with('success', '用户信息更新成功');
        } else {
            return back()->withErrors('信息更新失败，请重试');
        }
    }

    /**
     * 更新密码
     */
    public function updatePassword(Request $request)
    {
        $input = $request->input();

        Validator::make($input, [
            'password_old' => ['required', 'max:255'],
            'password' => ['required', 'max:255', 'confirmed'],
            'password_confirmation' => ['required', 'max:255'],
        ], [
            'password_old.required' => '原密码不能为空',
            'password_old.max' => '原密码不能超过:max个字符',
            'password.required' => '新密码不能为空',
            'password.max' => '新密码不能超过:max个字符',
            'password.confirmed' => '两次密码输入不一致',
            'password_confirmation.required' => '确认密码不能为空',
            'password_confirmation.max' => '确认密码不能超过:max个字符',
        ])->validate();

        $admin = User::find(session('admin')->id);
        if (!empty($input['password'])) {
            if (Hash::check($input['password_old'], $admin->password)) {
                $admin->password = bcrypt($input['password']);
            } else {
                return back()->withErrors('原密码输入有误');
            }
        }

        if ($admin->save()) {
            session(['admin' => $admin]); // 更新session
            return redirect('admin/profile')->with('success', '用户密码更新成功');
        } else {
            return back()->withErrors('密码更新失败，请重试');
        }
    }

    public function logout(Request $request)
    {
        session(['user' => null]);

        return redirect()->route('index.login');
    }
}
