<?php

use Faker\Generator as Faker;

$factory->define(App\LogisticsProvider::class, function () {
    $faker = \Faker\Factory::create('zh_CN'); // 汉化

    return [
        'name' => $faker->unique()->company,
        'price' => $faker->biasedNumberBetween() . '00',
        'contact' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});
