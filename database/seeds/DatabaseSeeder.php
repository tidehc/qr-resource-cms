<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmptyDbSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(LogisticsSeeder::class);
        $this->call(LogisticsProviderSeeder::class);
        $this->call(RecyclerSeeder::class);
        $this->call(ResourceSeeder::class);
        $this->call(TradeRecordSeeder::class);
        $this->call(UserSeeder::class);
    }
}
