<?php

use App\Patient;
use App\Professional;
use Faker\Generator as Faker;

$factory->define(App\MedicalAppointment::class, function (Faker $faker) {
    $state = $faker->randomElement(array_keys(__('app.selects.medical_appointment.state')));
    return [
        'date' => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = null),
        'observations' => $faker->text($maxNbChars = 200),
        'diagnosis' => $state === 'ATENDIDA' ? $faker->text($maxNbChars = 200) : null,
        'state' => $state,
        'professional_id' => function () {
            return factory(Professional::class)->create()->id;
        },
        'patient_id' => function () {
            return factory(Patient::class)->create()->id;
        },
    ];
});
