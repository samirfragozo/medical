<?php

use Faker\Generator as Faker;

$factory->define(App\TurnMedicine::class, function (Faker $faker, $data) {
    if (isset($data['turn_id'])) $turn = App\Turn::find($data['turn_id']);
    else $turn = factory(App\Turn::class)->create();
    $date = $faker->dateTimeBetween($startDate = $turn->start, $endDate = $turn->end);
    $date = $date->format("Y-m-d H:i:s");

    return [
        'date' => $date,
        'medicine_name' => $faker->text($maxNbChars = 50),
        'dose' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 100),
        'unit' => $faker->text($maxNbChars = 25),
        'route' => $faker->randomElement(array_keys(__('app.selects.turn_medicines.routes'))),
        'observations' => $faker->text($maxNbChars = 200),
        'turn_id' => $turn->id,
    ];
});
