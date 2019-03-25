<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'buttons' => [

    ],

    'messages' => [
        'medical_appointments' => [
            'ATENDIDA' => 'Cita Médica Atendida',
            'CANCELADA' => 'Cita Médica Cancelada',
            'PENDIENTE' => 'Cita Médica Pendiente',
        ],
        'turns' => [
            'ATENDIDO' => 'Turno Atendido',
            'CANCELADO' => 'Turno Cancelado',
            'PENDIENTE' => 'Turno Pendiente',
        ],
    ],

    'titles' => [
        'configuration' => 'Configuración',
        'home' => 'Inicio',
        'medical_appointments' => 'Citas Médicas',
        'nurses' => 'Enfermeras',
        'patient' => [
            'medical_appointments' => 'Citas Médicas - :name',
            'relatives' => 'Familiares - :name',
            'turns' => 'Turnos - :name',
        ],
        'patients' => 'Pacientes',
        'professionals' => 'Profesionales',
        'professional_types' => 'Tipos de Profesional',
        'professional_specialties' => 'Especialidades',
        'supplies' => 'Insumos',
        'turns' => 'Turnos',
    ],

    'roles' => [
        'provider' => 'Proveedor',
        'storekeeper' => 'Tendero',
    ],

    'sections' => [
        'academic_information' => 'Información Académica',
        'contact_information' => 'Información de Contacto',
        'medical_information' => 'Información Médica',
        'personal_information' => 'Información Personal',
    ],

    'selects' => [
        'medical_appointment' => [
            'state' => [
                'ATENDIDA' => 'ATENDIDA',
                'CANCELADA' => 'CANCELADA',
                'PENDIENTE' => 'PENDIENTE',
            ],
            'state_class' => [
                'ATENDIDA' => 'success',
                'CANCELADA' => 'danger',
                'PENDIENTE' => 'warning',
            ],
            'state_next' => [
                'ATENDIDA' => '',
                'CANCELADA' => '',
                'PENDIENTE' => 'ATENDIDA',
            ],
        ],
        'person' => [
            'civil_status' => [
                'CASADO(A)' => 'CASADO(A)',
                'SOLTERO(A)' => 'SOLTERO(A)',
                'UNION LIBRE' => 'UNION LIBRE'
            ],
            'document_type' => [
                'CC' => 'CÉDULA DE CIUDADANÍA',
                'CE' => 'CÉDULA DE EXTRANJERÍA'
            ],
            'sex' => [
                'FEMENINO' => 'FEMENINO',
                'MASCULINO' => 'MASCULINO',
            ],
        ],
        'professional' => [
            'title_type' => [
                'TÉCNICO' => 'TÉCNICO',
                'TECNÓLOGO' => 'TECNÓLOGO',
                'PROFESIONAL' => 'PROFESIONAL',
                'ESPECIALISTA' => 'ESPECIALISTA',
                'MAESTRÍA' => 'MAESTRÍA',
                'DOCTORADO' => 'DOCTORADO',
            ],
            'doctor_type' => [
                'MG' => 'MEDICINA GENERAL',
                'MI' => 'MEDICINA INTERNA',
                'C' => 'CARDIOLOGÍA',
                'PN' => 'PEDIATRÍA Y NEONATOLOGÍA',
                'GA' => 'GASTROENTEROLOGÍA',
                'NEU' => 'NEUROLOGÍA',
                'NEF' => 'NEFROLOGÍA',
                'GY' => 'GINECOLOGÍA',
                'I' => 'INFECTOLOGÍA',
                'O' => 'ONCOLOGÍA',
                'PH' => 'FONOAUDIOLOGIA',
                'ND' => 'NUTRICIÓN Y DIETÉTICA',
            ],
        ],
        'relative' => [
            'relationship' => [
                'ABUELA' => 'ABUELA',
                'ABUELO' => 'ABUELO',
                'HERMANA' => 'HERMANA',
                'HERMANO' => 'HERMANO',
                'MAMÁ' => 'MAMÁ',
                'OTRO' => 'OTRO',
                'PAPÁ' => 'PAPÁ',
                'PRIMO O PRIMA' => 'PRIMO O PRIMA',
                'TÍA' => 'TÍA',
                'TÍO' => 'TÍO',
            ],
        ],
        'social_security_entities' => [
            'type' => [
                'ARL' => 'ADMINISTRADORA DE RIESGOS LABORALES',
                'EPS' => 'ENTIDAD PROMOTORA DE SALUD',
            ],
        ],
        'supply' => [
            'unit' => [
                'DL' => 'DECILITRO',
                'G' => 'GRAMO',
                'KG' => 'KILOGRAMO',
                'LT' => 'LITRO',
                'MCG' => 'MICROGRAMO',
                'MG' => 'MILIGRAMO',
                'ML' => 'MILILITRO',
            ],
        ],
        'turns' => [
            'state' => [
                'ATENDIDO' => 'ATENDIDO',
                'CANCELADO' => 'CANCELADO',
                'EN PROGRESO' => 'EN PROGRESO',
                'PENDIENTE' => 'PENDIENTE',
            ],
            'state_class' => [
                'ATENDIDO' => 'success',
                'CANCELADO' => 'danger',
                'EN PROGRESO' => 'primary',
                'PENDIENTE' => 'warning',
            ],
            'state_next' => [
                'ATENDIDO' => '',
                'CANCELADO' => '',
                'EN PROGRESO' => 'ATENDIDO',
                'PENDIENTE' => 'EN PROGRESO',
            ],
        ],
    ],
];
