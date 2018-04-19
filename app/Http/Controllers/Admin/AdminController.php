<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Validator;
use Illuminate\Support\Facades\Hash;

/**
 * 管理员控制器
 */
class AdminController extends Controller
{
    /**
     * 个人信息视图
     */
    public function profile()
    {
        $admin = Admin::where('id', session('admin')->id)->first();

        return view('admin.profile', ['admin' => $admin]);
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

        $admin = Admin::find(session('admin')->id);
        if (!empty($input['username'])) {
            $admin->username = $input['username'];
        }
        if (!empty($input['email'])) {
            $admin->email = $input['email'];
        }
        if (!empty($input['phone'])) {
            $admin->phone = $input['phone'];
        }
        if (!empty($input['memo'])) {
            $admin->memo = $input['memo'];
        }

        if ($admin->save()) {
            session(['admin' => $admin]); // 更新session
            return redirect('admin/profile')->with('success', '管理员信息更新成功');
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

        $admin = Admin::find(session('admin')->id);
        if (!empty($input['password'])) {
            if (Hash::check($input['password_old'], $admin->password)) {
                $admin->password = bcrypt($input['password']);
            } else {
                return back()->withErrors('原密码输入有误');
            }
        }

        if ($admin->save()) {
            session(['admin' => $admin]); // 更新session
            return redirect('admin/profile')->with('success', '管理员密码更新成功');
        } else {
            return back()->withErrors('密码更新失败，请重试');
        }
    }
}
