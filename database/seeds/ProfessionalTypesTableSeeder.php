<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionalTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('professional_types')->delete();

        DB::table('professional_types')->insert([
            [
                'id' => 1,
                'name' => 'Doctor'
            ],
            [
                'id' => 2,
                'name' => 'Fisioterapeuta'
            ],
            [
                'id' => 3,
                'name' => 'Psicólogo'
            ],
            [
                'id' => 4,
                'name' => 'Enfermera Jefe'
            ],
            [
                'id' => 5,
                'name' => 'Enfermera'
            ],
        ]);

        Model::reguard();
    }
}
