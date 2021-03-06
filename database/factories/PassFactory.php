<?php

use App\Pass;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Pass::class, function (Faker $faker) {
    return [
        'name' => 'Yellowstone',
        'start' => Carbon::parse('May 15th ' . Carbon::now()->year),
        'end' => Carbon::parse('October 15th ' . Carbon::now()->year),
		'price' => $faker->numberBetween('2000','3000'),
        'slug' => 'yellowstone',
        'active' => 1
    ];
});
