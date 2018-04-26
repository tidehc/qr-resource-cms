<?php

use Illuminate\Database\Seeder;

class TradeRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->initTradeRecords();
    }

    /**
     * 初始化交易记录
     */
    public function initTradeRecords()
    {
        factory(App\TradeRecords::class, 20)->create();
    }
}
