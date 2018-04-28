<?php

use Illuminate\Database\Seeder;

class LogisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->initLogistics();
    }

    /**
     * 初始化物流信息
     */
    public function initLogistics()
    {
        factory(App\Logistics::class, 12)->create();
    }
}
