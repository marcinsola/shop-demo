<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->domainName,
        'description' => $faker->paragraph,
        'availability' => $faker->numberBetween(0, 100),
        'blocked_amount' => 0,
    ];
});
