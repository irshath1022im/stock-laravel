<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\StoreRequest;

$factory->define(StoreRequest::class, function (Faker $faker) {
    return [
       'requesting_date'=> $faker->dateTimeThisMonth($max = 'now', $timezone = null),
       'staff_id' => $faker->numberBetween($min= 1, $max=9),
       'status' => 'requested',
       'remark' =>  $faker->text($maxNbChars = 40)
    ];
});
