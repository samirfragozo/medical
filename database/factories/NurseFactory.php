<?php

use Faker\Generator as Faker;

$factory->define(App\Nurse::class, function (Faker $faker) {
    $gender = $faker->randomElement(array_keys(__('app.selects.person.sex')));

    return [
        'document_type' => $faker->randomElement(array_keys(__('app.selects.person.document_type'))),
        'document' => $faker->unique()->randomNumber($nbDigits = 9),
        'name' => $faker->firstName($gender),
        'last_name' => $faker->lastName . ' ' . $faker->lastName,
        'birth_date' => $faker->dateTimeBetween($startDate = '-60 years', $endDate = '-18 years', $timezone = null),
        'sex' => $gender,
        'civil_status' => $faker->randomElement(array_keys(__('app.selects.person.civil_status'))),
        'address' => $faker->streetAddress,
        'neighborhood' => $faker->streetName,
        'phone' => '5' . random_int (7, 9) . $faker->unique()->randomNumber($nbDigits = 5),
        'cellphone' => '3' . random_int (0, 2) . random_int (0, 9) . $faker->unique()->randomNumber($nbDigits = 7),
    ];
});
