<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Receiving;
use Faker\Generator as Faker;

$factory->define(Receiving::class, function (Faker $faker) {
    return [
        'receiving_date'=> $faker->dateTimeThisMonth($max='now', $timezone=null),
        'supplier_name' =>$faker->company()
    ];
});
