<?php

use Faker\Generator as Faker;

$factory->define(App\Professional::class, function (Faker $faker) {
    $gender = $faker->randomElement(array_keys(__('app.selects.person.sex')));

    return [
        'document_type' => $faker->randomElement(array_keys(__('app.selects.person.document_type'))),
        'document' => $faker->unique()->randomNumber($nbDigits = 9),
        'name' => $faker->firstName($gender),
        'last_name' => $faker->lastName . ' ' . $faker->lastName,
        'birth_date' => $faker->dateTimeBetween($startDate = '-60 years', $endDate = '-18 years'),
        'sex' => $gender,
        'civil_status' => $faker->randomElement(array_keys(__('app.selects.person.civil_status'))),
        'address' => $faker->streetAddress,
        'neighborhood' => $faker->streetName,
        'phone' => '5' . random_int (7, 9) . $faker->unique()->randomNumber($nbDigits = 5),
        'cellphone' => '3' . random_int (0, 2) . random_int (0, 9) . $faker->unique()->randomNumber($nbDigits = 7),
        'email' => $faker->unique()->safeEmail,
        'title' => $faker->jobTitle,
        'title_type' => $faker->randomElement(array_keys(__('app.selects.professional.title_type'))),
        'collage' => $faker->company,
        'year' => $faker->year($max = 'now'),
        'active' => $faker->boolean,
        'professional_specialty_id' => random_int(1, App\ProfessionalSpecialty::count()),
    ];
});
