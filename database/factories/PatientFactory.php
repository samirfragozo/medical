<?php

use Faker\Generator as Faker;

$factory->define(App\Patient::class, function (Faker $faker) {
    return [
        'allergies' => $faker->boolean,
        'allergies_description' => $faker->text($maxNbChars = 200),
        'medication_allergies' => $faker->boolean,
        'medication_allergies_description' => $faker->text($maxNbChars = 200),
        'medicines' => $faker->boolean,
        'medicines_description' => $faker->text($maxNbChars = 200),
        'person_id' => function () {
            return factory(\App\Person::class)->create()->id;
        },
        'social_security_entity_id' => random_int(1, \App\SocialSecurityEntity::count()),
        'active' => $faker->boolean,
    ];
});
