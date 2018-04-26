<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Resource;
use App\Category;

/**
 * 废弃资源控制器
 */
class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::orderBy('id', 'desc')->paginate(10);

        return view('admin.resource.index', [
            'resources' => $resources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resource = Resource::find($id);

        return view('admin.resource.show', [
            'resource' => $resource
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
        $resource = Resource::where('id', $id)->first();
        $categorys = Category::all();

        return view('admin.resource.edit', [
            'resource' => $resource,
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
            'category_id' => ['required', 'numeric'],
            'product_name' => ['required', 'max:50'],
            'menufactoring_number' => ['required', 'max:255'],
            'number_auth' => ['required', 'max:255'],
            'recycle_number' => ['required', 'max:255'],
            'toxic' => ['nullable', 'numeric'],
            'poison_category' => ['required', 'max:50'],
            'weight' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'jiao_hui_ren' => ['required', 'max:50'],
            'recycle_area' => ['required', 'max:255'],
            'recycle_company' => ['required', 'max:255'],
            'recycle_time' => ['required', 'regex:/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/'],
        ], [
            'category_id.required' => '分类ID不能为空',
            'category_id.numeric' => '分类ID必须是数字',
            'product_name.required' => '废弃资源名不能为空',
            'product_name.max' => '废弃资源名不能超过:max个字符',
            'menufactoring_number.required' => '出厂编号不能为空',
            'menufactoring_number.max' => '出厂编号不能超过:max个字符',
            'number_auth.required' => '编号授权方不能为空',
            'number_auth.max' => '编号授权方不能超过:max个字符',
            'recycle_number.required' => '回收编号不能为空',
            'recycle_number.max' => '回收编号不能超过:max个字符',
            'toxic.numeric' => '毒害性必须是数字',
            'poison_category.required' =>'毒害类别不能为空',
            'poison_category.max' =>'毒害类别不能超过:max个字符',
            'weight.required' =>'重量不能为空',
            'weight.numeric' =>'重量必须是数字',
            'quantity.required' =>'数量不能为空',
            'quantity.numeric' =>'数量必须是数字',
            'jiao_hui_ren.required' => '交回人不能为空',
            'jiao_hui_ren.max' => '交回人不能超过:max个字符',
            'recycle_area.required' => '回收地区不能为空',
            'recycle_area.max' => '回收地区不能超过:max个字符',
            'recycle_company.required' => '回收企业不能为空',
            'recycle_company.max' => '回收企业不能超过:max个字符',
            'recycle_time.required' => '回收时间不能为空',
            'recycle_time.regex' => '回收时间格式不符（YYYY-mm-dd HH:ii:ss）',
        ])->validate();

        $resource = Resource::find($id);
        $resource->category_id = $input['category_id'];
        $resource->product_name = $input['product_name'];
        $resource->menufactoring_number = $input['menufactoring_number'];
        $resource->number_auth = $input['number_auth'];
        $resource->recycle_number = $input['recycle_number'];
        $resource->toxic = $input['toxic'];
        $resource->poison_category = $input['poison_category'];
        $resource->weight = $input['weight'];
        $resource->quantity = $input['quantity'];
        $resource->jiao_hui_ren = $input['jiao_hui_ren'];
        $resource->recycle_area = $input['recycle_area'];
        $resource->recycle_company = $input['recycle_company'];
        $resource->recycle_time = $input['recycle_time'];

        if ($resource->save()) {
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
     * 删除废弃资源
     * 
     * @return [type] [description]
     */
    public function delete(Request $request)
    {
        if (Resource::destroy($request->id)) {
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
