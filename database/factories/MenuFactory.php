<?php

use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker) {
    return [
        'status' => $faker->randomElement(['sell','sell','sell', 'not sell'])
    ];
});
