<?php

use Faker\Generator as Faker;

$factory->define(App\TurnMedicine::class, function (Faker $faker) {
    $turn = factory(App\Turn::class)->create();
    $date = $faker->dateTimeBetween($startDate = $turn->start, $endDate = $turn->end);
    $date = $date->format("Y-m-d H:i:s");

    return [
        'date' => $date,
        'observations' => $faker->text($maxNbChars = 200),
        'turn_id' => $turn->id,
    ];
});
