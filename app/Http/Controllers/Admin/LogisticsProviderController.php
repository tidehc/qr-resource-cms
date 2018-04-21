<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\LogisticsProvider;
use App\Category;

/**
 * 后台物流商控制器
 */
class LogisticsProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logisticsProviders = LogisticsProvider::orderBy('id', 'desc')->paginate(10);

        return view('admin.logisticsProvider.index', [
            'logisticsProviders' => $logisticsProviders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.logisticsProvider.create');
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
            'name' => ['required', 'max:50', 'unique:logistics_providers,name'],
            'price' => ['required', 'numeric'],
            'contact' => ['required', 'max:50'],
            'phone' => ['required', 'regex:/^1[3|4|5|6|7|8][0-9]{9}$/'],
            'email' => ['required', 'email'],
        ], [
            'name.required' => '商家名不能为空',
            'name.max' => '商家名不能超过:max个字符',
            'name.max' => '商家名已存在',
            'price.unique' => '价格不能为空',
            'price.numeric' => '价格必须是数字',
            'contact.required' => '联系人不能为空',
            'contact.max' => '联系人不能超过:max个字符',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机号格式不符',
            'email.required' => '电子邮箱不能为空',
            'email.email' => '电子邮箱格式不符',
        ])->validate();

        $logisticsProvider = new LogisticsProvider;
        $logisticsProvider->name = $input['name'];
        $logisticsProvider->price = empty($input['price']) ? '0.00' : sprintf("%.2f", $input['price']);
        $logisticsProvider->contact = empty($input['contact']) ? '' : $input['contact'];
        $logisticsProvider->phone = empty($input['phone']) ? '' : $input['phone'];
        $logisticsProvider->email = empty($input['email']) ? '' : $input['email'];

        if ($logisticsProvider->save()) {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logisticsProvider = LogisticsProvider::where('id', $id)->first();

        return view('admin.logisticsProvider.edit', [
            'logisticsProvider' => $logisticsProvider
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
            'name' => ['required', 'max:50'],
            'price' => ['required', 'numeric'],
            'contact' => ['required', 'max:50'],
            'phone' => ['required', 'regex:/^1[3|4|5|6|7|8][0-9]{9}$/'],
            'email' => ['required', 'email'],
        ], [
            'name.required' => '商家名不能为空',
            'name.max' => '商家名不能超过:max个字符',
            'price.required' => '价格不能为空',
            'price.numeric' => '价格必须是数字',
            'contact.required' => '联系人不能为空',
            'contact.max' => '联系人不能超过:max个字符',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机号格式不符',
            'email.required' => '电子邮箱不能为空',
            'email.email' => '电子邮箱格式不符',
        ])->validate();

        $logisticsProvider = logisticsProvider::find($id);
        $logisticsProvider->name = $input['name'];
        $logisticsProvider->price = empty($input['price']) ? '0.00' : sprintf("%.2f", $input['price']);
        $logisticsProvider->contact = empty($input['contact']) ? '' : $input['contact'];
        $logisticsProvider->phone = empty($input['phone']) ? '' : $input['phone'];
        $logisticsProvider->email = empty($input['email']) ? '' : $input['email'];

        if ($logisticsProvider->save()) {
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
     * 删除物流商
     * 
     * @return [type] [description]
     */
    public function delete(Request $request)
    {
        if (LogisticsProvider::destroy($request->id)) {
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
}
