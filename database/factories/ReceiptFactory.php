<?php

use Faker\Generator as Faker;
use App\Dining_table as Dining_table;

$factory->define(App\Receipt::class, function (Faker $faker) {

	$dining_tables = Dining_table::where('status','!=','empty')->get()->pluck('id')->toArray();

    return [
        'table_id' => $faker->randomElement($dining_tables)
    ];

});
