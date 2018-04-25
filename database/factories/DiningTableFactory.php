<?php

use Faker\Generator as Faker;

$factory->define(App\Dining_table::class, function (Faker $faker) {
    return [
      'seat' => $faker->randomDigit + 1,
    	'status' => $faker->randomElement(['empty', 'busy'])
    ];
});
