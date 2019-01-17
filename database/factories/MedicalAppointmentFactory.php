<?php

use Faker\Generator as Faker;

$factory->define(App\MedicalAppointment::class, function (Faker $faker) {
    $start = $faker->time($format = 'H:i:s');
    $end = date('H:i:s', strtotime($start) + (30 * 60));
    return [
        'date' => $faker->dateTime($max = 'now'),
        'start' => $start,
        'end' => $end,
        'observations' => $faker->text($maxNbChars = 200),
        'professional_id' => function () {
            return factory(\App\Professional::class)->create()->id;
        },
        'patient_id' => function () {
            return factory(\App\Patient::class)->create()->id;
        },

    ];
});
