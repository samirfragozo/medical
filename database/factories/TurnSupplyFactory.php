<?php

use Faker\Generator as Faker;

$factory->define(App\TurnSupply::class, function (Faker $faker, $data) {
    if (isset($data['turn_id'])) $turn = App\Turn::find($data['turn_id']);
    else $turn = factory(App\Turn::class)->create();
    $date = $faker->dateTimeBetween($startDate = $turn->start, $endDate = $turn->end);
    $date = $date->format("Y-m-d H:i:s");

    return [
        'date' => $date,
        'quantity' => $faker->numberBetween($min = 1, $max = 5),
        'unit' => $faker->text($maxNbChars = 25),
        'observations' => $faker->text($maxNbChars = 200),
        'supply_id' => function () {
            return factory(App\Supply::class)->create()->id;
        },
        'turn_id' => $turn->id,
    ];
});
