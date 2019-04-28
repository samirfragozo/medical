<?php

use Faker\Generator as Faker;

$factory->define(App\TurnFluid::class, function (Faker $faker, $data) {
    if (isset($data['turn_id'])) $turn = App\Turn::find($data['turn_id']);
    else $turn = factory(App\Turn::class)->create();
    $date = $faker->dateTimeBetween($startDate = $turn->start, $endDate = $turn->end);
    $date = $date->format("Y-m-d H:i:s");

    return [
        'date' => $date,
        'type' => $faker->randomElement(array_keys(__('app.selects.turn_fluids.types'))),
        'total' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 1000),
        'observations' => $faker->text($maxNbChars = 200),
        'turn_id' => $turn->id,
    ];
});
