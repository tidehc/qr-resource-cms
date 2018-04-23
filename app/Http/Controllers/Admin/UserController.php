<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;

/**
 * 用户控制器
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'username' => ['required', 'max:50', 'unique:users,username'],
            'password' => ['required', 'max:255', 'confirmed'],
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
            'username.required' => '用户名不能为空',
            'username.max' => '用户名不能超过:max个字符',
            'username.unique' => '用户名已存在',
            'password.required' => '密码不能为空',
            'password.max' => '密码不能超过:max个字符',
            'password.confirmed' => '两次密码不一致',
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

        $user = new User;
        $user->username = $input['username'];
        $user->password = bcrypt($input['password']);
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
            return back()->with('success', '添加成功');
        } else {
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
        $user = User::find($id);

        return view('admin.user.show', [
            'user' => $user
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
        $user = User::where('id', $id)->first();

        return view('admin.user.edit', [
            'user' => $user
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
        
        Validator::make($input, [
            'username' => ['required', 'max:50'],
            'password' => ['required', 'max:255', 'confirmed'],
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
            'username.required' => '用户名不能为空',
            'username.max' => '用户名不能超过:max个字符',
            'password.required' => '密码不能为空',
            'password.max' => '密码不能超过:max个字符',
            'password.confirmed' => '两次密码不一致',
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

        $user = user::find($id);
        $user->username = $input['username'];
        $user->password = bcrypt($input['password']);
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
            return back()->with('success', '更新成功，请刷新页面');
        } else {
            return back()->withErrors('更新失败，请重试');
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
     * 删除用户
     * 
     * @return [type] [description]
     */
    public function delete(Request $request)
    {
        if (User::destroy($request->id)) {
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
     * 确认改密
     * 
     * @return [type] [description]
     */
    public function comfirmUpdatePwd(Request $request, $id)
    {
        $input = $request->input();

        dd($input);
    }
}
