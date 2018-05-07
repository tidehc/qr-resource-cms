<?php

use Faker\Generator as Faker;

$factory->define(App\Logistics::class, function () {
    $faker = \Faker\Factory::create('zh_CN'); // 汉化

    return [
        'logistics_number' => date('YmdHis') . random_int(1.0e7, 9.9e7),
        'product_name' => '废弃聚丙烯塑料' . str_random(4),
        'category_id' => 1,
        'logistics_price' => $faker->biasedNumberBetween() . '00',
        'delivery_date' => $faker->dateTime(),
        'arrive_date' => $faker->dateTime(),
        'delivery_man' => $faker->name,
        'receive_man' => $faker->name,
        'delivery_phone' => $faker->phoneNumber,
        'receive_phone' => $faker->phoneNumber,
    ];
});
