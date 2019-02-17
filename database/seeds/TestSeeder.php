<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        factory(App\Patient::class, 50)->create();
        factory(App\Professional::class, 25)->create();
        factory(App\Nurse::class, 25)->create();

        for ($i = 0; $i < 500; $i++) {
            factory(App\MedicalAppointment::class)->create([
                'patient_id' => random_int(1, \App\Patient::count()),
                'professional_id' => random_int(1, \App\Professional::count()),
            ]);

            factory(App\Turn::class)->create([
                'patient_id' => random_int(1, \App\Patient::count()),
                'nurse_id' => random_int(1, \App\Nurse::count()),
            ]);
        }

        for ($i = 1; $i <= \App\Patient::count(); $i++) {
            factory(App\Relative::class, random_int(1, 5))->create([
                'patient_id' => $i,
            ]);
        }

        factory(App\Supply::class, 5)->create();
    }
}
