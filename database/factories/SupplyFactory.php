<?php

use Faker\Generator as Faker;

$factory->define(App\Supply::class, function (Faker $faker) {
    return [
        'code' => 'INS-' . $faker->randomDigit,
        'name' => $faker->jobTitle,
        'content' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'unit' => $faker->randomElement(array_keys(__('app.selects.supply.unit'))),
        'active' => $faker->boolean,
    ];
});
