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
            'update' => 'No se puede atender una Cita Médica CANCELADA',
        ],
        'turns' => [
            'ATENDIDO' => 'Turno Atendido',
            'CANCELADO' => 'Turno Cancelado',
            'EN PROGRESO' => 'Turno En Progreso',
            'PENDIENTE' => 'Turno Pendiente',
        ],
    ],

    'titles' => [
        'configuration' => 'Configuración',
        'home' => 'Inicio',
        'medical_appointments' => 'Citas Médicas',
        'nurses' => 'Enfermeras',
        'nurse' => [
            'turns' => 'Mis Turnos',
            'turn_cures' => 'Evolución de Curaciones - Turno :name',
            'turn_fluids' => 'Control de Líquidos - Turno :name',
            'turn_medicines' => 'Administración de Medicamentos - Turno :name',
            'turn_notes' => 'Notas de Enfermería - Turno :name',
            'turn_supplies' => 'Control de Insumos - Turno :name',
            'turn_vital_signs' => 'Control de Signos Vitales - Turno :name',
        ],
        'patient' => [
            'medical_appointments' => 'Citas Médicas - :name',
            'relatives' => 'Familiares - :name',
            'turns' => 'Turnos - :name',
        ],
        'patients' => 'Pacientes',
        'professional' => [
            'medical_appointments' => 'Mis Citas Médicas',
        ],
        'professionals' => 'Profesionales',
        'professional_types' => 'Tipos de Profesional',
        'professional_specialties' => 'Especialidades',
        'relatives' => 'Familiares',
        'supplies' => 'Insumos',
        'turn_cures' => 'Evolución de Curaciones',
        'turn_fluids' => 'Control de Líquidos',
        'turn_medicines' => 'Administración de Medicamentos',
        'turn_notes' => 'Notas de Enfermería',
        'turn_supplies' => 'Control de Insumos',
        'turn_vital_signs' => 'Control de Signos Vitales',
        'turns' => 'Turnos',
    ],

    'roles' => [
        'admin' => 'Administrador',
        'nurse' => 'Enfermera',
        'professional' => 'Profesional',
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
        'supplies' => [
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
        'turn_fluids' => [
            'types' => [
                'ORAL' => 'ORAL - Administrado',
                'PARENTERAL' => 'PARENTERAL - Administrado',
                'NUTRICIÓN' => 'NUTRICIÓN - Administrado',
                'DIURESIS' => 'DIURESIS - Eliminado',
                'DRENAJE A' => 'DRENAJE A - Eliminado',
                'DRENAJE B' => 'DRENAJE B - Eliminado',
                'OTRO' => 'OTRO - Eliminado',
            ],
        ],
        'turn_medicines' => [
            'routes' => [
                'ORAL' => 'ORAL',
                'SUBLINGUAL' => 'SUBLINGUAL',
                'TÓPICA' => 'TÓPICA',
                'RECTAL' => 'RECTAL',
                'VAGINAL' => 'VAGINAL',
                'PARENTERAL' => 'PARENTERAL',
                'ÓTICA' => 'ÓTICA',
                'OFTÁLMICA' => 'OFTÁLMICA',
                'TD' => 'TRANSDÉRMICA',
                'TRANSDÉRMICA' => 'INHALATORIA',
                'INTRANASAL' => 'INTRANASAL',
            ],
        ],
    ],
];
