<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function () {
    
    static $password;;

    $faker = \Faker\Factory::create('zh_CN'); // 汉化

    return [
        'username' => $faker->unique()->name,
        'password' => $password ?: $password = bcrypt('user'),
        'logic' => substr($faker->realText(), 0, 50),
        'address' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'production_enterprise' => $faker->company,
        'seller' => $faker->company,
        'recycler' => $faker->company,
        'trader' => $faker->company,
        'logistics_provider' => $faker->company,
        'dismantling_enterprise' => $faker->company,
        'memo' => $faker->text(),
    ];
});
