<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\Role;
use App\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->deleteEntrustTables();
        $this->InitEntrust();
    }

    /**
     * 初始化权限系统
     * 
     * @return [type] [description]
     */
    public function initEntrust()
    {
        // 初始化管理员
        DB::table('admins')->insert([
            ['username' => 'admin', 'password' => bcrypt('admin')],
            ['username' => '竺文',   'password' => bcrypt('zhuwen')],
        ]);

        // 初始化角色
        DB::table('roles')->insert([
            ['name' => 'admin',  'display_name' => '管理员',  'description' => '网站的总负责人'],
            ['name' => 'editor', 'display_name' => '网站编辑', 'descritpion' => '主要做网站的维护工作'],
        ]);

        // 初始化权限
        DB::table('permissions')->insert([
            ['name' => 'resource-list',   'display_name' => '资源列表'],
            ['name' => 'resource-show',   'display_name' => '查看资源'],
            ['name' => 'resource-create', 'display_name' => '添加资源'],
            ['name' => 'resource-edit',   'display_name' => '编辑资源'],
            ['name' => 'resource-delete', 'display_name' => '删除资源'],
            
            ['name' => 'category-list',   'display_name' => '分类列表'],
            ['name' => 'category-show',   'display_name' => '查看分类'],
            ['name' => 'category-create', 'display_name' => '添加分类'],
            ['name' => 'category-edit',   'display_name' => '编辑分类'],
            ['name' => 'category-delete', 'display_name' => '删除分类'],
            
            ['name' => 'tradeRecord-list',   'display_name' => '交易记录列表'],
            ['name' => 'tradeRecord-show',   'display_name' => '查看交易记录'],
            ['name' => 'tradeRecord-create', 'display_name' => '添加交易记录'],
            ['name' => 'tradeRecord-edit',   'display_name' => '编辑交易记录'],
            ['name' => 'tradeRecord-delete', 'display_name' => '删除交易记录'],
            
            ['name' => 'logistics-list',   'display_name' => '物流信息列表'],
            ['name' => 'logistics-show',   'display_name' => '查看物流信息'],
            ['name' => 'logistics-create', 'display_name' => '添加物流信息'],
            ['name' => 'logistics-edit',   'display_name' => '编辑物流信息'],
            ['name' => 'logistics-delete', 'display_name' => '删除物流信息'],

            ['name' => 'recycler-list',   'display_name' => '回收商列表'],
            ['name' => 'recycler-show',   'display_name' => '查看回收商'],
            ['name' => 'recycler-create', 'display_name' => '添加回收商'],
            ['name' => 'recycler-edit',   'display_name' => '编辑回收商'],
            ['name' => 'recycler-delete', 'display_name' => '删除回收商'],

            ['name' => 'logisticsProvider-list',   'display_name' => '物流商列表'],
            ['name' => 'logisticsProvider-show',   'display_name' => '查看物流商'],
            ['name' => 'logisticsProvider-create', 'display_name' => '添加物流商'],
            ['name' => 'logisticsProvider-edit',   'display_name' => '编辑物流商'],
            ['name' => 'logisticsProvider-delete', 'display_name' => '删除物流商'],

            ['name' => 'user-list',   'display_name' => '用户列表'],
            ['name' => 'user-show',   'display_name' => '查看用户'],
            ['name' => 'user-create', 'display_name' => '添加用户'],
            ['name' => 'user-edit',   'display_name' => '编辑用户'],
            ['name' => 'user-delete', 'display_name' => '删除用户'],

            ['name' => 'entrust-admin-list',   'display_name' => '管理员列表'],
            ['name' => 'entrust-admin-show',   'display_name' => '查看管理员'],
            ['name' => 'entrust-admin-create', 'display_name' => '添加管理员'],
            ['name' => 'entrust-admin-edit',   'display_name' => '编辑管理员'],
            ['name' => 'entrust-admin-delete', 'display_name' => '删除管理员'],
            ['name' => 'entrust-admin-log',    'display_name' => '管理员日志'],

            ['name' => 'entrust-role-list',   'display_name' => '角色列表'],
            ['name' => 'entrust-role-show',   'display_name' => '查看角色'],
            ['name' => 'entrust-role-create', 'display_name' => '添加角色'],
            ['name' => 'entrust-role-edit',   'display_name' => '编辑角色'],
            ['name' => 'entrust-role-delete', 'display_name' => '删除角色'],

            ['name' => 'entrust-permission-list',   'display_name' => '权限列表'],
            ['name' => 'entrust-permission-show',   'display_name' => '查看权限'],
            ['name' => 'entrust-permission-create', 'display_name' => '添加权限'],
            ['name' => 'entrust-permission-edit',   'display_name' => '编辑权限'],
            ['name' => 'entrust-permission-delete', 'display_name' => '删除权限'],
        ]);

        // 角色绑定
        $admin = Admin::where('username', 'admin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $admin->attachRole($adminRole);

        $zhuwen = Admin::where('username', '竺文')->first();
        $editor = Role::where('name', 'editor')->first();
        $zhuwen->attachRole($editor);

        // 权限绑定
        $permissions = Permission::where('name', 'not like', 'entrust-%') // 去除权限系统相关权限
                                 ->where('name', 'not like', 'user-%')    // 去除用户相关权限
                                 ->where('name', 'not like', '%-delete')  // 去除所有删除权限
                                 ->pluck('id');
        $editor->attachPermissions($permissions);
    }

    /**
     * 删除权限系统相关表
     */
    public function deleteEntrustTables()
    {
        DB::beginTransaction(); // 开启事务
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // 关闭外键约束的校验

        DB::table('permission_role')->truncate();
        DB::table('permissions')->truncate();
        DB::table('role_admin')->truncate();
        DB::table('roles')->truncate();
        DB::table('admins')->truncate();
    
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // 开启外检约束的校验
        DB::commit(); // 提交事务
    }
}
