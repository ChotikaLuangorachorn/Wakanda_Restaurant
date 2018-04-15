<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
	$receipts = App\Receipt::all()->pluck("id")->toArray();

    return [
        'menu_id' => $faker->randomElement(App\Menu::all()->pluck("id")->toArray()),
        'amount' => $faker->randomDigit,
        'receipt_id' => $faker->randomElement($receipts)
    ];

});
