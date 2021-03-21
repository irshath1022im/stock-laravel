<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\IssuedItem;
use App\StoreRequestItem;
use Faker\Generator as Faker;

$factory->define(StoreRequestItem::class, function (Faker $faker) {
    return [
        'store_request_id' => $faker->numberBetween($min= 1, $max=100),
        'item_id' => $faker->numberBetween($min= 1, $max=23),
        'qty' => $faker->numberBetween($min=1, $max=5),
        'remark' => $faker->text($maxNbChars = 40)
    ];
});
