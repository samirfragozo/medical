<?php

use Faker\Generator as Faker;

$factory->define(App\Supply::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->numerify('POS-###'),
        'name' => $faker->jobTitle,
        'content' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'unit' => $faker->randomElement(array_keys(__('app.selects.supplies.unit'))),
        'active' => $faker->boolean,
    ];
});
