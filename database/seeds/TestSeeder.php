<?php

use App\MedicalAppointment;
use App\Nurse;
use App\Patient;
use App\Professional;
use App\Relative;
use App\Supply;
use App\Turn;
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
        factory(Patient::class, 50)->create();
        factory(Professional::class, 25)->create();
        factory(Nurse::class, 25)->create();

        for ($i = 0; $i < 500; $i++) {
            factory(MedicalAppointment::class)->create([
                'patient_id' => random_int(1, Patient::count()),
                'professional_id' => random_int(1, Professional::count()),
            ]);

            factory(Turn::class)->create([
                'patient_id' => random_int(1, Patient::count()),
                'nurse_id' => random_int(1, Nurse::count()),
            ]);
        }

        for ($i = 1; $i <= Patient::count(); $i++) {
            factory(Relative::class, random_int(1, 5))->create([
                'patient_id' => $i,
            ]);
        }

        factory(Supply::class, 5)->create();
    }
}
