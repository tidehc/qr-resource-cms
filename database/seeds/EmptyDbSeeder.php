<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmptyDbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->emptyDb();
    }

    /**
     * 清空数据库
     */
    public function emptyDb()
    {
        DB::beginTransaction(); // 开启事务
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // 关闭外键约束的校验

        DB::table('admins')->truncate();
        DB::table('admin_logs')->truncate();
        DB::table('resources')->truncate();
        DB::table('categorys')->truncate();
        DB::table('recyclers')->truncate();
        DB::table('trade_records')->truncate();
        DB::table('logistics_providers')->truncate();
        DB::table('users')->truncate();
        DB::table('logistics')->truncate();
        DB::table('permission_role')->truncate();
        DB::table('permissions')->truncate();
        DB::table('role_admin')->truncate();
        DB::table('roles')->truncate();
    
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // 开启外检约束的校验
        DB::commit(); // 提交事务
    }
}
