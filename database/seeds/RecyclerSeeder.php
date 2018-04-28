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
        factory(App\Recycler::class, 12)->create();
    }
}
