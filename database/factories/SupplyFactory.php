<?php

use Faker\Generator as Faker;

$factory->define(App\Supply::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->numerify('SUP-###'),
        'name' => $faker->text($maxNbChars = 50),
        'content' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 1000),
        'unit' => $faker->text($maxNbChars = 25),
        'active' => $faker->boolean,
    ];
});
