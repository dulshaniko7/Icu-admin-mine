<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->word,
        'product_code' => $faker->numberBetween(1000,9999),
        'product_price' => $faker->numberBetween(50,5000),
        'status'=>1,
        'description' => $faker->text(150)
    ];
});
