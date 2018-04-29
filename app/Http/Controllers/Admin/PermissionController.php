<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Permission;

/**
 * 权限控制器
 */
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('id', 'desc')->paginate(10);

        return view('admin.permission.index', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
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
            'name' => ['required', 'max:255', 'unique:permissions,name'],
            'display_name' => ['required', 'max:255'],
            'description' => ['nullable', 'max:255'],
        ], [
            'name.required' => '权限名不能为空',
            'name.max' => '权限名不能超过:max个字符',
            'name.unique' => '权限名已存在',
            'display_name.required' => '显示名称不能为空',
            'display_name.max' => '显示名称不能超过:max个字符',
            'description.max' => '描述不能超过:max个字符'
        ])->validate();

        $permission = new Permission;
        $permission->name = $input['name'];
        $permission->display_name = $input['display_name'];
        $permission->description = $input['description'] ?: '';
        
        if ($permission->save()) {
            return back()->with('success', '添加成功，请刷新页面');
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
        $permission = Permission::where('id', $id)->first();

        return view('admin.permission.edit', [
            'permission' => $permission
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
            'name' => ['required', 'max:255'],
            'display_name' => ['required', 'max:255'],
            'description' => ['nullable', 'max:255'],
        ], [
            'name.required' => '权限名不能为空',
            'name.max' => '权限名不能超过:max个字符',
            'display_name.required' => '显示名称不能为空',
            'display_name.max' => '显示名称不能超过:max个字符',
            'description.max' => '描述不能超过:max个字符'
        ])->validate();

        $category = Permission::find($id);
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
     * 删除
     * 
     * @return [type] [description]
     */
    public function delete(Request $request)
    {
        if (Permission::destroy($request->id)) {
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
