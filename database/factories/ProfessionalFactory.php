<?php

use Faker\Generator as Faker;

$factory->define(App\Professional::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'title_type' => $faker->randomElement(array_keys(__('app.selects.professional.title_type'))),
        'collage' => $faker->company,
        'year' => $faker->year($max = 'now'),
        'professional_specialty_id' => random_int(1, \App\ProfessionalSpecialty::count()),
        'person_id' => function () {
            return factory(\App\Person::class)->create()->id;
        },
    ];
});
