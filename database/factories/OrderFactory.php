<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'receiving_id' => $faker->numberBetween($min=1, $max=100),
        'item_id'=>$faker->numberBetween($min=1, $max=23),
        'qty' =>$faker->numberBetween($min=25, $max=35)
    ];
});
