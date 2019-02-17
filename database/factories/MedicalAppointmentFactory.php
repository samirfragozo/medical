<?php

use Faker\Generator as Faker;

$factory->define(App\MedicalAppointment::class, function (Faker $faker) {
    return [
        'date' => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = null),
        'observations' => $faker->text($maxNbChars = 200),
        'state' => $faker->randomElement(array_keys(__('app.selects.medical_appointment.state'))),
        'professional_id' => function () {
            return factory(\App\Professional::class)->create()->id;
        },
        'patient_id' => function () {
            return factory(\App\Patient::class)->create()->id;
        },
    ];
});
