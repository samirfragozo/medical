<?php

return [

    [
        'crud' => 'home',
        'route' => 'home',
        'icon' => 'fa fa-home',
    ],
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

];
