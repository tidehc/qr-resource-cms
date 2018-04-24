<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;

/**
 * 前台用户控制器
 */
class UserController extends Controller
{
    /**
     * 个人信息视图
     */
    public function profile()
    {
        $user = User::where('id', session('user')->id)->first();

        return view('index.profile', ['user' => $user]);
    }

    /**
     * 更新个人信息
     */
    public function updateProfile(Request $request)
    {
        $input = $request->input();

        Validator::make($input, [
            'logic' => ['nullable', 'max:50'],
            'address' => ['nullable', 'max:255'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'regex:/^1[3|4|5|6|7|8][0-9]{9}$/'],
            'production_enterprise' => ['nullable', 'max:255'],
            'seller' => ['nullable', 'max:255'],
            'recycler' => ['nullable', 'max:255'],
            'trader' => ['nullable', 'max:255'],
            'logistics_provider' => ['nullable', 'max:255'],
            'dismantling_enterprise' => ['nullable', 'max:255'],
            'memo' => ['nullable', 'max:255'],
        ], [
            'logic.max' => '用户注册不能超过:max个字符',
            'address.max' => '地址不能超过:max个字符',
            'email.email' => '电子邮箱格式不符',
            'phone.regex' => '手机号格式不符',
            'production_enterprise.max' => '原产品生产企业不能超过:max个字符',
            'seller.max' => '销售商不能超过:max个字符',
            'recycler.max' => '回收商不能超过:max个字符',
            'trader.max' => '交易商不能超过:max个字符',
            'logistics_provider.max' => '物流商不能超过:max个字符',
            'dismantling_enterprise.max' => '拆解企业不能超过:max个字符',
            'memo.max' => '备注不能超过:max个字符',
        ])->validate();

        $user = User::find(session('user')->id);
        $user->logic = empty($input['logic']) ? '' : $input['logic'];
        $user->address = empty($input['address']) ? '' : $input['address'];
        $user->email = empty($input['email']) ? '' : $input['email'];
        $user->phone = empty($input['phone']) ? '' : $input['phone'];
        $user->production_enterprise = empty($input['production_enterprise']) ? '' : $input['production_enterprise'];
        $user->seller = empty($input['seller']) ? '' : $input['seller'];
        $user->recycler = empty($input['recycler']) ? '' : $input['recycler'];
        $user->trader = empty($input['trader']) ? '' : $input['trader'];
        $user->logistics_provider = empty($input['logistics_provider']) ? '' : $input['logistics_provider'];
        $user->dismantling_enterprise = empty($input['dismantling_enterprise']) ? '' : $input['dismantling_enterprise'];
        $user->memo = empty($input['memo']) ? '' : $input['memo'];

        if ($user->save()) {
            session(['user' => $user]); // 更新session
            return redirect('index/profile')->with('success', '用户信息更新成功');
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

        $user = User::find(session('user')->id);
        if (!empty($input['password'])) {
            if (Hash::check($input['password_old'], $user->password)) {
                $user->password = bcrypt($input['password']);
            } else {
                return back()->withErrors('原密码输入有误');
            }
        }

        if ($user->save()) {
            session(['user' => $user]); // 更新session
            return redirect('index/profile')->with('success', '用户密码更新成功');
        } else {
            return back()->withErrors('密码更新失败，请重试');
        }
    }
}
