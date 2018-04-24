<?php

use Faker\Generator as Faker;

$factory->define(App\Resource::class, function () {
    $faker = \Faker\Factory::create('zh_CN'); // 汉化

    return [
        'production_name' => '聚乙烯篮子箱子' . str_random(6),
        'menufactoring_number' => $faker->unique()->uuid,
        'number_auth' => '河北省秦皇岛市环保局',  
        'recycle_number' => ($faker->unique()->uuid() . str_random(4)),
        'toxic' => random_int(0, 1),
        'poison_category' => '中等',
        'weight' => random_int(10, 100),
        'quantity' => random_int(100, 2000),
        'jiao_hui_ren' => $faker->name,
        'recycle_area' => $faker->streetAddress,
        'recycle_company' => $faker->company,
        'recycle_time' => $faker->dateTime(),
    ];
});
