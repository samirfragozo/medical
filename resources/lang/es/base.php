<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Base Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'attributes' => [
        'actions' => 'Acciones',
        'active' => 'Activo',
        'agree' => 'Acepto los términos y condiciones.',
        'email' => 'Correo Electrónico',
        'password' => 'Contraseña',
        'password_confirmation' => 'Confirmar Contraseña',
        'remember' => 'Recordar Sesión',
        'search' => 'Buscar',
        'status' => 'Estado',
    ],

    'buttons' => [
        'cancel' => 'Cancelar',
        'create' => 'Agregar',
        'export' => 'Exportar',
        'filters' => 'Filtros',
        'forget_password' => '¿Olvidó su contraseña?',
        'logout' => 'Cerrar sesión',
        'massive' => 'Masivos',
        'reload' => 'Recargar',
        'sign_in' => 'Iniciar sesión',
        'sign_up' => 'Regístrate',
        'submit' => 'Solicitar',
    ],

    'dataTables' => [
        'url' => 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
        'paginate' => [
            'sFirst' => '<<',
            'sLast' => '>>',
            'sNext' => '>',
            'sPrevious' => '<',
        ],
    ],

    'filters' => [
        '' => 'Todos',
        '1' => 'Activo',
        '0' => 'Inactivo',
    ],

    'massive' => [
        'activate' => 'Activar',
        'deactivate' => 'Desactivar',
    ],

    'messages' => [
        'active' => [
            '1' => ':name - Activado',
            '0' => ':name - Desactivado',
        ],
        'delete' => ':name - Eliminado',
        'massive' => 'Debe elegir al menos un registro',
        'store' => ':name  - Agregado',
        'invalid_request' => 'Los datos proporcionados no son válidos',
        'update' => ':name - Actualizado',
    ],

    'placeholder' => 'Seleccione una opción',

    'titles' => [
        'create' => 'Agregar',
        'email' => 'Restauración de contraseña',
        'login' => 'Inicio de sesión',
        'register' => 'Registrarse',
        'reset' => 'Cambio de contraseña',
        'verify' => 'Confirmar correo electrónico',
    ],

    'subtitles' => [
        'email' => 'Ingrese su correo electrónico para solicitar la restauración de su contraseña',
        'login' => 'Ingrese sus credenciales para iniciar sesión',
        'register' => 'Ingrese sus datos para crear su cuenta',
        'reset' => 'Ingrese su nueva contraseña para realizar la restauración',
        'verify' => '',
    ],
];