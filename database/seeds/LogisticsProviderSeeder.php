<?php

use Illuminate\Database\Seeder;

class LogisticsProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->initLogisticsProvider();
    }

    /**
     * 初始化物流商
     */
    public function initLogisticsProvider()
    {
        factory(App\LogisticsProvider::class, 12)->create();
    }
}
