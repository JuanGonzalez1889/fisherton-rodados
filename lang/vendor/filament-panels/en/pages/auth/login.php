<?php

return [

    'title' => 'Iniciar sesión',

    'heading' => 'Ingresar',

    'actions' => [

        'register' => [
            'before' => 'or',
            'label' => 'registrarse para una cuenta',
        ],

        'request_password_reset' => [
            'label' => '¿Olvidaste tu contraseña?',
        ],

    ],

    'form' => [

        'email' => [
            'label' => 'Correo electrónico',
        ],

        'password' => [
            'label' => 'Contraseña',
        ],

        'remember' => [
            'label' => 'Recuérdame',
        ],

        'actions' => [

            'authenticate' => [
                'label' => 'Iniciar sesión',
            ],

        ],

    ],

    'messages' => [

        'failed' => 'Estas credenciales no coinciden con nuestros registros.',

    ],

    'notifications' => [

        'throttled' => [
            'title' => 'Demasiados intentos de inicio de sesión',
            'body' => 'Por favor, inténtalo de nuevo en :seconds segundos.',
        ],

    ],

];
