<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' =>$faker->name,
        'initialQty' => $faker->randomDigit,
        'category_id' => $faker->numberBetween($min = 1, $max = 5)
    ];
});
