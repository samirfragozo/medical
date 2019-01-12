<?php

use Faker\Generator as Faker;

$factory->define(App\Professional::class, function (Faker $faker) {
    $type = $faker->randomElement(array_keys(__('app.selects.professional.type')));
    return [
        'type' => $type,
        'doctor_type' => $type == 'DOCTOR' ? $faker->randomElement(array_keys(__('app.selects.professional.doctor_type'))) : NULL,
        'title' => $faker->jobTitle,
        'title_type' => $faker->randomElement(array_keys(__('app.selects.professional.title_type'))),
        'collage' => $faker->company,
        'year' => $faker->year($max = 'now'),
        'person_id' => function () {
            return factory(\App\Person::class)->create()->id;
        },
    ];
});
