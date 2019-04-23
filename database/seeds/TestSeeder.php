<?php

use App\MedicalAppointment;
use App\Nurse;
use App\Patient;
use App\Professional;
use App\Relative;
use App\Supply;
use App\Turn;
use App\TurnCure;
use App\TurnNote;
use App\User;
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

        $nurse = factory(Nurse::class)->create([
            'email' => 'nurse@admin.com'
        ]);

        factory(User::class)->create([
            'name' => $nurse->full_name,
            'email' => $nurse->email,
            'model_type' => 'App\Nurse',
            'model_id' => $nurse->id,
        ])->assignRole('nurse');

        $professional = factory(Professional::class)->create([
            'email' => 'professional@admin.com'
        ]);

        factory(User::class)->create([
            'name' => $professional->full_name,
            'email' => $professional->email,
            'model_type' => 'App\Professional',
            'model_id' => $professional->id,
        ])->assignRole('professional');

        for ($i = 0; $i < 25; $i++) {
            $professional = factory(Professional::class)->create();

            factory(User::class)->create([
                'name' => $professional->full_name,
                'email' => $professional->email,
                'model_type' => 'App\Professional',
                'model_id' => $professional->id,
            ])->assignRole('professional');

            $nurse = factory(Nurse::class)->create();

            factory(User::class)->create([
                'name' => $nurse->full_name,
                'email' => $nurse->email,
                'model_type' => 'App\Nurse',
                'model_id' => $nurse->id,
            ])->assignRole('nurse');
        }

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

        foreach (Turn::all() as $turn) {
            if ($turn->state !== 'CANCELADO' and $turn->state !== 'PENDIENTE') {
                factory(TurnCure::class, random_int(1, 5))->create([
                    'turn_id' => $turn->id,
                ]);

                factory(App\TurnFluid::class, random_int(1, 5))->create([
                    'turn_id' => $turn->id,
                ]);

                factory(App\TurnMedicine::class, random_int(1, 5))->create([
                    'turn_id' => $turn->id,
                ]);

                factory(TurnNote::class, random_int(1, 5))->create([
                    'turn_id' => $turn->id,
                ]);

                factory(App\TurnSupply::class, random_int(1, 5))->create([
                    'turn_id' => $turn->id,
                ]);

                factory(App\TurnVitalSign::class, random_int(1, 5))->create([
                    'turn_id' => $turn->id,
                ]);
            }
        }

        factory(Supply::class, 5)->create();
    }
}
