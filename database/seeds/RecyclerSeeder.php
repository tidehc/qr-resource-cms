<?php

use Illuminate\Database\Seeder;

class RecyclerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->initRecycler();
    }

    /**
     * 初始化回收商
     */
    public function initRecycler()
    {
        // 填充 20 个
        factory(App\Recycler::class, 20)->create();
    }
}
