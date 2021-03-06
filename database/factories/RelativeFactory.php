<?php

use Faker\Generator as Faker;

$factory->define(App\Relative::class, function (Faker $faker) {
    $gender = $faker->randomElement(array_keys(__('app.selects.person.sex')));

    return [
        'document_type' => $faker->randomElement(array_keys(__('app.selects.person.document_type'))),
        'document' => $faker->unique()->randomNumber($nbDigits = 9),
        'name' => $faker->firstName($gender),
        'last_name' => $faker->lastName . ' ' . $faker->lastName,
        'sex' => $gender,
        'address' => $faker->streetAddress,
        'neighborhood' => $faker->streetName,
        'phone' => '5' . random_int (7, 9) . $faker->unique()->randomNumber($nbDigits = 5),
        'cellphone' => '3' . random_int (0, 2) . random_int (0, 9) . $faker->unique()->randomNumber($nbDigits = 7),
        'relationship' => $faker->randomElement(array_keys(__('app.selects.relative.relationship'))),
        'patient_id' => function () {
            return factory(App\Patient::class)->create()->id;
        },
    ];
});
