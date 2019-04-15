<?php

return [

    [
        'name' => 'nurse',
        'menu' => [
            [
                'crud' => 'nurse.turns',
                'icon' => 'fa fa-notes-medical',
            ],
        ],
    ],
    [
        'name' => 'professional',
        'menu' => [
            [
                'crud' => 'professional.medical_appointments',
                'icon' => 'fa fa-briefcase-medical',
            ],
        ],
    ],
    [
        'name' => 'admin',
        'menu' => [
            [
                'crud' => 'turns',
                'icon' => 'fa fa-notes-medical',
            ],
            [
                'crud' => 'medical_appointments',
                'icon' => 'fa fa-briefcase-medical',
            ],
            [
                'crud' => 'patients',
                'icon' => 'fa fa-user',
            ],
            [
                'crud' => 'professionals',
                'icon' => 'fa fa-user-md',
            ],
            [
                'crud' => 'nurses',
                'icon' => 'fa fa-file-medical-alt',
            ],
            [
                'icon' => 'fa fa-cog',
                'name' => 'configuration',
                'submenu' => [
                    [
                        'crud' => 'supplies',
                    ],
                    [
                        'name' => 'professionals',
                        'submenu' => [
                            [
                                'crud' => 'professional_specialties',
                            ],
                            [
                                'crud' => 'professional_types',
                            ],
                        ]
                    ],
                ],
            ],
        ],
    ],

];
