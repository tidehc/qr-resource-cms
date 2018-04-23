<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->initUser();
    }

    /**
     * 初始化用户
     */
    public function initUser()
    {
        // 填充 20 个
        factory(App\User::class, 20)->create();
    }
}
