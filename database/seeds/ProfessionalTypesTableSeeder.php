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
                'code' => 'TIP-001',
                'name' => 'Doctor'
            ],
            [
                'id' => 2,
                'code' => 'TIP-002',
                'name' => 'Fisioterapeuta'
            ],
            [
                'id' => 3,
                'code' => 'TIP-003',
                'name' => 'Psicólogo'
            ],
            [
                'id' => 4,
                'code' => 'TIP-004',
                'name' => 'Enfermera Jefe'
            ],
        ]);

        Model::reguard();
    }
}
