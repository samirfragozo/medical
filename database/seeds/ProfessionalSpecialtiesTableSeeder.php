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
                'name' => 'Medicina General',
                'professional_type_id' => 1,
            ],
            ['name' => 'Medicina Interna',
                'professional_type_id' => 1,
            ],
            ['name' => 'Cardiología',
                'professional_type_id' => 1,
            ],
            ['name' => 'Pediatría y Neonatología',
                'professional_type_id' => 1,
            ],
            ['name' => 'Gastroenterología',
                'professional_type_id' => 1,
            ],
            ['name' => 'Neurología',
                'professional_type_id' => 1,
            ],
            ['name' => 'Nefrología',
                'professional_type_id' => 1,
            ],
            ['name' => 'Ginecología',
                'professional_type_id' => 1,
            ],
            ['name' => 'Infectología',
                'professional_type_id' => 1,
            ],
            ['name' => 'Oncología',
                'professional_type_id' => 1,
            ],
            ['name' => 'Fonoaudilogía',
                'professional_type_id' => 1,
            ],
            ['name' => 'Nutrición y Dietética',
                'professional_type_id' => 1,
            ],
            ['name' => 'Física',
                'professional_type_id' => 2,
            ],
            ['name' => 'Respiratoria',
                'professional_type_id' => 2,
            ],
            ['name' => 'Ocupacional',
                'professional_type_id' => 2,
            ],
            ['name' => 'Psicólogo',
                'professional_type_id' => 3,
            ],
            ['name' => 'Enfermera Jefe',
                'professional_type_id' => 4,
            ],
            ['name' => 'Enfermera',
                'professional_type_id' => 5,
            ],
        ]);

        Model::reguard();
    }
}
