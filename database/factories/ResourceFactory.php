<?php

use Faker\Generator as Faker;

$factory->define(App\Resource::class, function () {
    $faker = \Faker\Factory::create('zh_CN'); // 汉化

    static $toxic;

    return [
        'category_id' => 1, 
        'product_name' => '聚乙烯篮子箱子' . str_random(6),
        'menufactoring_number' => date('YmdHis') . random_int(10000000, 99999999),
        'number_auth' => '河北省秦皇岛市环保局',  
        'recycle_number' => date('YmdHis') . random_int(100000000000, 999999999999)
,
        'toxic' => $toxic = random_int(0, 1),
        'poison_category' => $toxic ? '中等': '无',
        'weight' => random_int(10, 100),
        'quantity' => random_int(100, 2000),
        'jiao_hui_ren' => $faker->name,
        'recycle_area' => $faker->address,
        'recycle_company' => $faker->company,
        'recycle_time' => $faker->dateTime(),
    ];
});
