<?php

use Faker\Generator as Faker;

$factory->define(App\Turn::class, function (Faker $faker) {
    $start = $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = null);
    $start = $start->format("Y-m-d H:i:s");
    $end = date("Y-m-d H:i:s", strtotime('+8 hours',strtotime($start)));

    return [
        'start' => $start,
        'end' => $end,
        'observations' => $faker->text($maxNbChars = 200),
        'state' => $faker->randomElement(array_keys(__('app.selects.turns.state'))),
        'nurse_id' => function () {
            return factory(\App\Nurse::class)->create()->id;
        },
        'patient_id' => function () {
            return factory(\App\Patient::class)->create()->id;
        },
    ];
});
