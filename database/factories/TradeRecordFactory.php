<?php

use Faker\Generator as Faker;

$factory->define(App\TradeRecord::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('zh_CN'); // 汉化

    return [
        'order_number' => date('YmdHis') . str_random(9),
        'menufactoring_number' => date('YmdHis') . random_int(10000000, 99999999),
        'product_name' => '聚乙烯篮子箱子' . str_random(4),
        'category_id' => 1,
        'weight' => random_int(10, 100),
        'quantity' => random_int(100, 2000),
        'product_price' => $faker->biasedNumberBetween() . '00',
        'order_time' => $faker->dateTime(),
        'toxic' => random_int(0, 1),
        'trader' => $faker->company,
        'recycler' => $faker->company,
        'memo' => substr($faker->text, 0, 50),
    ];
});
