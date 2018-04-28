<?php

use Illuminate\Database\Seeder;

class TradeRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->initTradeRecord();
    }

    /**
     * 初始化交易记录
     */
    public function initTradeRecord()
    {
        factory(App\TradeRecord::class, 12)->create();
    }
}
