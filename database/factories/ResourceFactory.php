<?php

use Faker\Generator as Faker;

$factory->define(App\Resource::class, function () {
    $faker = \Faker\Factory::create('zh_CN'); // 汉化

    static $toxic;
    $category_ids = [1, 2, 3];

    return [
        'category_id' => $faker->randomElement($category_ids), 
        'product_name' => '聚乙烯篮子箱子' . str_random(4),
        'menufactoring_number' => date('YmdHis') . str_random(8),
        'number_auth' => '河北省秦皇岛市环保局',
        'recycle_number' => date('YmdHis') . str_random(12),
        'toxic' => $toxic = random_int(0, 1),
        'poison_category' => $toxic ? '中等': '无',
        'weight' => random_int(10, 100),
        'quantity' => random_int(100, 2000),
        'jiao_hui_ren' => $faker->name,
        'recycle_area' => '甘肃省临夏回族自治州积石山保安族东乡族撒哈拉族自治县吹麻滩镇',
        'recycle_company' => $faker->company,
        'recycle_time' => $faker->dateTime(),
    ];
});
