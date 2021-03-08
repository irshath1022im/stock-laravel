<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Delivery;
use Faker\Generator as Faker;

$factory->define(Delivery::class, function (Faker $faker) {
    return [
       'date'=> $faker->dateTimeThisMonth($max = 'now', $timezone = null),
       'name' => $faker->randomElement($array = array('Dean Lavy', 'Irshath', 'Shanu', 'Alex Lebon'))
    ];
});
