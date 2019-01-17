<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionalSpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('professional_specialties')->delete();

        DB::table('professional_specialties')->insert([
            [
                'code' => 'ESP-001',
                'name' => 'Medicina General',
                'professional_type_id' => 1,
            ],
            [
                'code' => 'ESP-002',
                'name' => 'Medicina Interna',
                'professional_type_id' => 1,
            ],
            [
                'code' => 'ESP-003',
                'name' => 'Cardiología',
                'professional_type_id' => 1,
            ],
            [
                'code' => 'ESP-004',
                'name' => 'Pediatría y Neonatología',
                'professional_type_id' => 1,
            ],
            [
                'code' => 'ESP-005',
                'name' => 'Gastroenterología',
                'professional_type_id' => 1,
            ],
            [
                'code' => 'ESP-006',
                'name' => 'Neurología',
                'professional_type_id' => 1,
            ],
            [
                'code' => 'ESP-007',
                'name' => 'Nefrología',
                'professional_type_id' => 1,
            ],
            [
                'code' => 'ESP-008',
                'name' => 'Ginecología',
                'professional_type_id' => 1,
            ],
            [
                'code' => 'ESP-009',
                'name' => 'Infectología',
                'professional_type_id' => 1,
            ],
            [
                'code' => 'ESP-010',
                'name' => 'Oncología',
                'professional_type_id' => 1,
            ],
            [
                'code' => 'ESP-011',
                'name' => 'Fonoaudilogía',
                'professional_type_id' => 1,
            ],
            [
                'code' => 'ESP-012',
                'name' => 'Nutrición y Dietética',
                'professional_type_id' => 1,
            ],
            [
                'code' => 'ESP-013',
                'name' => 'Física',
                'professional_type_id' => 2,
            ],
            [
                'code' => 'ESP-014',
                'name' => 'Respiratoria',
                'professional_type_id' => 2,
            ],
            [
                'code' => 'ESP-015',
                'name' => 'Ocupacional',
                'professional_type_id' => 2,
            ],
            [
                'code' => 'ESP-016',
                'name' => 'Psicólogo',
                'professional_type_id' => 3,
            ],
            [
                'code' => 'ESP-017',
                'name' => 'Enfermera Jefe',
                'professional_type_id' => 4,
            ],
            [
                'code' => 'ESP-018',
                'name' => 'Enfermera',
                'professional_type_id' => 5,
            ],
        ]);

        Model::reguard();
    }
}
