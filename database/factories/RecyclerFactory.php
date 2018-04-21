<?php

use Faker\Generator as Faker;

$factory->define(App\Recycler::class, function () {
    $faker = \Faker\Factory::create('zh_CN'); // 汉化

    return [
        'name' => $faker->unique()->company,
        'category_id' => 2,
        'product_price' => $faker->biasedNumberBetween() . '00',
        'address' => $faker->address,
        'contact' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});
