<?php

defined('AA_DOMAIN') or define('AA_DOMAIN', 'masterskaya.loc');
defined('AA_URL') or define('AA_URL', 'http://'.AA_DOMAIN);

return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',

    'id_project_support' => 777,

    'transport_email' => [
        'class' => 'Swift_SmtpTransport',
        'host' => 'smtp.gmail.com', // хост почтовго сервера
        'username' => 'acher.owlweb@gmail.com', // имя пользователя
        'password' => 'acherowlweb1!', // пароль пользователя
        'port' => '587', // порт сервера
        'encryption' => 'tls', // тип шифрования
    ],
];
