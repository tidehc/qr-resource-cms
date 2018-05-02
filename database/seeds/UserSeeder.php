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
        factory(App\User::class, 11)->create();
        factory(App\User::class)->create([
            'username' => '谢伦宇',
            'password' => bcrypt('xielunyu')
        ]);
    }
}
