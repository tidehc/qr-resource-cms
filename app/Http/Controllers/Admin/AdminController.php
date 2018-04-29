<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Role;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException as Exception;
use Illuminate\Support\Facades\DB;

/**
 * 管理员控制器
 */
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('id', 'desc')->paginate(10);

        return view('admin.admin.index', [
            'admins' => $admins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.admin.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->input();

        Validator::make($input, [
            'username' => ['required', 'max:255', 'unique:admins,username'],
            'password' => ['required', 'max:255', 'confirmed'],
            'password_confirmation' => ['required', 'max:255'],
            'roles' => ['nullable'],
        ], [
            'username.required' => '用户名不能为空',
            'username.max' => '用户名不能超过:max个字符',
            'username.unique' => '用户名已存在',
            'password.required' => '新密码不能为空',
            'password.max' => '新密码不能超过:max个字符',
            'password.confirmed' => '两次密码输入不一致',
            'password_confirmation.required' => '确认密码不能为空',
            'password_confirmation.max' => '确认密码不能超过:max个字符',
        ])->validate();
        if (!empty($input['roles']) && !is_array($input['roles'])) {
            return back()->withErrors('角色格式非法');
        }

        $admin = new Admin;
        $admin->username = $input['username'];
        $admin->password = bcrypt($input['password']);

        DB::beginTransaction();
        try {
            $admin->save();
            if (!empty($input['roles'])) {
                $admin->roles()->sync($input['roles']);
            }
            DB::commit();

            return back()->with('success', '添加成功，请刷新页面');
        } catch (Exception $e) {
            DB::rollback();

            return back()->withErrors('添加失败，请重试');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::where('id', $id)->first();

        return view('admin.admin.show', [
            'admin' => $admin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::where('id', $id)->first();
        $roles = Role::all();

        return view('admin.admin.edit', [
            'admin' => $admin,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->input();

        if (!empty($input['roles']) && !is_array($input['roles'])) {
            return back()->withErrors('角色格式非法');
        }

        $admin = Admin::find($id);

        DB::beginTransaction();
        try {
            $admin->save();
            if (!empty($input['roles'])) {
                $admin->roles()->sync($input['roles']);
            }
            DB::commit();

            return back()->with('success', '修改成功，请刷新页面');
        } catch (Exception $e) {
            DB::rollback();

            return back()->withErrors('修改失败，请重试');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 删除
     * 
     * @return [type] [description]
     */
    public function delete(Request $request)
    {
        if (Admin::destroy($request->id)) {
            return [
                'code' => 0,
                'msg' => '删除成功',
                'data' => '',
                'url' => ''
            ];
        } else {
            return [
                'code' => 1,
                'msg' => '删除失败，请重试',
                'data' => '',
                'url' => ''
            ];
        }
    }

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
