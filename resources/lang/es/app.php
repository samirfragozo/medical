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
        'orders' => 'Ordenar',
        'roles' => [
            'provider' => 'Convertirse en Proveedor',
            'storekeeper' => 'Convertirse en Tendero',
        ],
    ],

    'messages' => [
        'cart' => [
            'add' => ':name  - Agregado al Carrito',
            'order' => '{1} Se ha agregado una nueva orden|[2,*] Se han agregado :value nuevas ordenes',
            'remove' => ':name  - Eliminado del Carrito',
        ],
        'orders' => [
            'cancelled' => 'Orden Cancelada',
            'cancelled_user' => 'Orden Cancelada',
            'dispatched' => 'Orden Enviada',
            'delivered' => 'Orden Entregada',
            'pending' => 'Orden Pendiente',
        ],
        'roles' => [
            'provider' => 'Te has convertido en Proveedor',
            'storekeeper' => 'Te has convertido en Tendero',
        ],
    ],

    'titles' => [
        'cart' => 'Mi Carrito',
        'home' => 'Inicio',
        'orders' => 'Mis Pedidos',
        'products' => 'Productos',
        'stores' => 'Tiendas',
        'provider' => [
            'orders' => 'Pedidos',
            'products' => 'Mis Productos',
        ],
        'providers_cart' => 'Mi Carrito - Proveedores',
        'providers_rol' => 'Mi Empresa - Proveedores',
        'storekeeper' => [
            'cart' => 'Mi Carrito - Proveedores',
            'orders' => 'Mis Pedidos',
            'products' => 'Productos',
            'providers' => 'Proveedores',
            'stores' => 'Mis Tiendas',
        ],
        'user' => 'Mi Usuario',
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
        'person' => [
            'civil_status' => [
                'MARRIED' => 'CASADO(A)',
                'SINGLE' => 'SOLTERO(A)',
                'FREE_UNION' => 'UNION LIBRE'
            ],
            'document_type' => [
                'CC' => 'CÉDULA DE CIUDADANÍA',
                'CE' => 'CÉDULA DE EXTRANJERÍA'
            ],
            'sex' => [
                'FEMALE' => 'FEMENINO',
                'MALE' => 'MASCULINO',
            ],
        ],
        'social_security_entities' => [
            'type' => [
                'ARL' => 'ADMINISTRADORA DE RIESGOS LABORALES',
                'EPS' => 'ENTIDAD PROMOTORA DE SALUD',
            ],
        ],
        'professional' => [
            'type' => [
                'DOCTOR' => 'MÉDICO',
                'NURSE' => 'ENFERMERA',
                'NURSE BOOS' => 'ENFERMERA JEFE',
                'THERAPIST' => 'TERAPEUTA',
            ],
            'title_type' => [
                'TECHNICAL' => 'TÉCNICO',
                'TECHNOLOGIST' => 'TECNÓLOGO',
                'PROFESSIONAL' => 'PROFESIONAL',
                'SPECIALIST' => 'ESPECIALISTA',
                'MASTER' => 'MAESTRÍA',
                'DOCTORATE' => 'DOCTORADO',
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
    ],

    'singular_titles' => [
        'stores' => 'Tienda',
    ],
];
