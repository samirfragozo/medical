<?php

use Faker\Generator as Faker;

$factory->define(App\TurnVitalSign::class, function (Faker $faker) {
    $turn = factory(App\Turn::class)->create();
    $date = $faker->dateTimeBetween($startDate = $turn->start, $endDate = $turn->end);
    $date = $date->format("Y-m-d H:i:s");

    return [
        'date' => $date,
        'TA_S' => $faker->numberBetween($min = 100, $max = 140),
        'TA_D' => $faker->numberBetween($min = 60, $max = 90),
        'FR' => $faker->numberBetween($min = 12, $max = 18),
        'FC' => $faker->numberBetween($min = 50, $max = 100),
        'SPO2' => $faker->numberBetween($min = 95, $max = 100),
        'T' => $faker->randomFloat($nbMaxDecimals = 1, $min = 36.5, $max = 37.2),
        'observations' => $faker->text($maxNbChars = 200),
        'turn_id' => $turn->id,
    ];
});
