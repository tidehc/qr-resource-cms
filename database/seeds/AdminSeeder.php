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
        $this->InitAdmin();
    }

    /**
     * 初始化管理员
     * 
     * @return [type] [description]
     */
    public function initAdmin()
    {
        // 添加管理员
        DB::table('admins')->insert(
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
            ]
        );

        // 添加管理员角色
        $adminRole = new Role;
        $adminRole->name = 'Administrator';
        $adminRole->display_name = '管理员';
        $adminRole->description = '管理员是项目的总负责人';
        $adminRole->save();

        // 管理员绑定管理员角色
        $admin = Admin::where('username', 'admin')->first();
        $admin->attachRole($adminRole);

        //　添加“所有权限”
        $allPermissions = new Permission();
        $allPermissions->name = 'AllPermissions';
        $allPermissions->display_name = '所有权限';
        $allPermissions->description = '代表整个项目的所有操作权限';
        $allPermissions->save();

        //　管理员角色绑定“所有权限”
        $adminRole->attachPermission($allPermissions);
    }
}
