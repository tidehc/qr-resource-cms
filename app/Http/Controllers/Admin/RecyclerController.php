<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Recycler;
use App\Category;

/**
 * 后台回收商控制器
 */
class RecyclerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recyclers = Recycler::orderBy('id', 'desc')->paginate(10);

        return view('admin.recycler.index', [
            'recyclers' => $recyclers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();

        return view('admin.recycler.create', [
            'categorys' => $categorys
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
            'name' => ['required', 'max:50', 'unique:recyclers,name'],
            'category_id' => ['required', 'numeric'],
            'product_price' => ['required', 'numeric'],
            'address' => ['required', 'max:255'],
            'contact' => ['required', 'max:50'],
            'phone' => ['required', 'regex:/^1[3|4|5|6|7|8][0-9]{9}$/'],
            'email' => ['required', 'email'],
        ], [
            'name.required' => '商家名不能为空',
            'name.max' => '商家名不能超过:max个字符',
            'category_id.required' => '回收分类不能为空',
            'category_id.numeric' => '回收分类ID必须是数字',
            'product_price.required' => '回收价格不能为空',
            'product_price.numeric' => '回收价格必须是数字',
            'address.required' => '详细地址不能为空',
            'address.max' => '详细地址不能超过:max个字符',
            'contact.required' => '联系人不能为空',
            'contact.max' => '联系人不能超过:max个字符',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机号格式不符',
            'email.required' => '电子邮箱不能为空',
            'email.email' => '电子邮箱格式不符',
        ])->validate();

        $recycler = new Recycler;
        $recycler->name = $input['name'];
        $recycler->category_id = $input['category_id'];
        $recycler->product_price = empty($input['product_price']) ? '0.00' : sprintf("%.2f", $input['product_price']);
        $recycler->address = empty($input['address']) ? '' : $input['address'];
        $recycler->contact = empty($input['contact']) ? '' : $input['contact'];
        $recycler->phone = empty($input['phone']) ? '' : $input['phone'];
        $recycler->email = empty($input['email']) ? '' : $input['email'];

        if ($recycler->save()) {
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
        $recycler = Recycler::where('id', $id)->first();
        $categorys = Category::all();

        return view('admin.recycler.edit', [
            'recycler' => $recycler,
            'categorys' => $categorys
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
            'category_id' => ['required', 'numeric'],
            'product_price' => ['required', 'numeric'],
            'address' => ['required', 'max:255'],
            'contact' => ['required', 'max:50'],
            'phone' => ['required', 'regex:/^1[3|4|5|6|7|8][0-9]{9}$/'],
            'email' => ['required', 'email'],
        ], [
            'name.required' => '商家名不能为空',
            'name.max' => '商家名不能超过:max个字符',
            'category_id.required' => '回收分类不能为空',
            'category_id.numeric' => '回收分类ID必须是数字',
            'product_price.required' => '回收价格不能为空',
            'product_price.numeric' => '回收价格必须是数字',
            'address.required' => '详细地址不能为空',
            'address.max' => '详细地址不能超过:max个字符',
            'contact.required' => '联系人不能为空',
            'contact.max' => '联系人不能超过:max个字符',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机号格式不符',
            'email.required' => '电子邮箱不能为空',
            'email.email' => '电子邮箱格式不符',
        ])->validate();

        $recycler = recycler::find($id);
        $recycler->name = $input['name'];
        $recycler->category_id = $input['category_id'];
        $recycler->product_price = empty($input['product_price']) ? '0.00' : sprintf("%.2f", $input['product_price']);
        $recycler->address = empty($input['address']) ? '' : $input['address'];
        $recycler->contact = empty($input['contact']) ? '' : $input['contact'];
        $recycler->phone = empty($input['phone']) ? '' : $input['phone'];
        $recycler->email = empty($input['email']) ? '' : $input['email'];
        $recycler->address = empty($input['address']) ? '' : $input['address'];
        $recycler->contact = empty($input['contact']) ? '' : $input['contact'];
        $recycler->phone = empty($input['phone']) ? '' : $input['phone'];
        $recycler->email = empty($input['email']) ? '' : $input['email'];

        if ($recycler->save()) {
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
     * 删除回收商
     * 
     * @return [type] [description]
     */
    public function delete(Request $request)
    {
        if (Recycler::destroy($request->id)) {
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
