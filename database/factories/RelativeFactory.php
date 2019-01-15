<?php

use Faker\Generator as Faker;

$factory->define(App\Relative::class, function (Faker $faker) {
    return [
        'relationship' => $faker->randomElement(array_keys(__('app.selects.relative.relationship'))),
        'person_id' => function () {
            return factory(\App\Person::class)->create()->id;
        },
        'patient_id' => function () {
            return factory(\App\Patient::class)->create()->id;
        },
    ];
});
