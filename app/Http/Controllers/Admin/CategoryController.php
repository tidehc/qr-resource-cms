<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Category;

/**
 * 资源类别控制器
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::orderBy('id', 'desc')->paginate(10);

        return view('admin.category.index', [
            'categorys' => $categorys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name' => ['required', 'max:50', 'unique:categorys,name'],
            'display_name' => ['required', 'max:50'],
            'description' => ['nullable', 'max:50'],
        ], [
            'name.required' => '分类名不能为空',
            'name.max' => '分类名不能超过:max个字符',
            'name.unique' => '分类名已存在',
            'display_name.required' => '显示名称不能为空',
            'display_name.max' => '显示名称不能超过:max个字符',
            'description.max' => '描述不能超过:max个字符'
        ])->validate();

        $category = new Category;
        $category->name = $input['name'];
        $category->display_name = $input['display_name'];
        $category->description = $input['description'] ?: '';
        if ($category->save()) {
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
        $category = Category::where('id', $id)->first();

        return view('admin.category.edit', [
            'category' => $category
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
            'display_name' => ['required', 'max:50'],
            'description' => ['nullable', 'max:50'],
        ], [
            'name.required' => '分类名不能为空',
            'name.max' => '分类名不能超过:max个字符',
            'name.unique' => '分类名已存在',
            'display_name.required' => '显示名称不能为空',
            'display_name.max' => '显示名称不能超过:max个字符',
            'description.max' => '描述不能超过:max个字符'
        ])->validate();

        $category = Category::find($id);
        $category->name = $input['name'];
        $category->display_name = $input['display_name'];
        $category->description = $input['description'] ?: '';
        if ($category->save()) {
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
     * 删除分类
     * 
     * @return [type] [description]
     */
    public function delete(Request $request)
    {
        if (Category::destroy($request->id)) {
            return [
                'code' => 0,
                'msg' => '删除成功',
                'data' => '',
                'url' => ''
            ];
        } else {
            return [
                'code' => 0,
                'msg' => '删除失败，请重试',
                'data' => '',
                'url' => ''
            ];
        }
    }
}
