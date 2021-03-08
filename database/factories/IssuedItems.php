<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\IssuedItem;
use Faker\Generator as Faker;

$factory->define(IssuedItem::class, function (Faker $faker) {
    return [
        'delivery_id' => $faker->numberBetween($min= 1, $max=100),
        'item_id' => $faker->numberBetween($min= 1, $max=23),
        'issued_date' => $faker->dateTimeThisMonth($max='now', $timezone=null),
        'staff_id' => $faker->numberBetween($min=1, $max=5),
        'qty' => $faker->numberBetween($min=1, $max=5)
    ];
});
