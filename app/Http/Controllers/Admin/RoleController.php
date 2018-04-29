<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException as Exception;

/**
 * 角色控制器
 */
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->paginate(10);

        return view('admin.role.index', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admin.role.create', [
            'permissions' => $permissions
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
            'name' => ['required', 'max:255', 'unique:roles,name'],
            'display_name' => ['required', 'max:255'],
            'description' => ['nullable', 'max:255'],
            'permissions' => ['nullable'],
        ], [
            'name.required' => '角色名不能为空',
            'name.max' => '角色名不能超过:max个字符',
            'name.unique' => '角色名已存在',
            'display_name.required' => '显示名称不能为空',
            'display_name.max' => '显示名称不能超过:max个字符',
            'description.max' => '描述不能超过:max个字符',
        ])->validate();
        if (!empty($input['permissions']) && !is_array($input['permissions'])) {
            return back()->withErrors('权限格式非法');
        }

        $role = new Role;
        $role->name = $input['name'];
        $role->display_name = $input['display_name'];
        $role->description = $input['description'] ?: '';   
        
        DB::beginTransaction(); // 开启事务
        try {
            $role->save();
            if (!empty($input['permissions'])) {
                $role->perms()->sync($input['permissions']); // 同步权限
            }
            DB::commit(); // 提交事务

            return back()->with('success', '添加成功，请刷新页面');
        } catch (Exception $e) {
            DB::rollback(); // 回滚事务

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
        $role = Role::where('id', $id)->first();

        return view('admin.role.show', [
            'role' => $role
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
        $role = Role::where('id', $id)->first();
        $permissions = Permission::all();

        return view('admin.role.edit', [
            'role' => $role,
            'permissions' => $permissions,
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
            'permissions' => ['nullable'],
        ], [
            'name.required' => '角色名不能为空',
            'name.max' => '角色名不能超过:max个字符',
            'display_name.required' => '显示名称不能为空',
            'display_name.max' => '显示名称不能超过:max个字符',
            'description.max' => '描述不能超过:max个字符',
        ])->validate();
        if (!empty($input['permissions']) && !is_array($input['permissions'])) {
            return back()->withErrors('权限格式非法');
        }

        $role = Role::find($id);
        $role->name = $input['name'];
        $role->display_name = $input['display_name'];
        $role->description = $input['description'] ?: '';

        DB::beginTransaction(); // 开启事务
        try {
            $role->save();
            $role->perms()->sync($input['permissions']); // 同步权限
            DB::commit(); // 提交事务

            return back()->with('success', '更新成功，请刷新页面');
        } catch (Exception $e) {
            DB::rollback(); // 回滚事务

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
        if (Role::destroy($request->id)) {
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
