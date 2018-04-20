<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Recycler::class, function () {
    $faker = \Faker\Factory::create('zh_CN'); // 汉化

    return [
        'name' => $faker->company,
        'category_id' => 2,
        'product_price' => $faker->biasedNumberBetween() . '00',
        'address' => $faker->address,
        'contact' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});
