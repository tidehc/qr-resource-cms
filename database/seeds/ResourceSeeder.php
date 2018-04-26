<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->initResource();
    }

    /**
     * 初始化废弃资源
     */
    public function initResource()
    {
        factory(App\Resource::class, 20)->create();
    }
}
