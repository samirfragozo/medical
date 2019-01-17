<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MedicalAppointment::class, 5)->create();
        factory(App\Relative::class, 5)->create();
    }
}
