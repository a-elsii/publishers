<?php

use app\models\I18nUrlManager;

$params = require(__DIR__ . '/params-local.php');
$db = require(__DIR__ . '/db-local.php');
$rules = require(__DIR__ . '/url-rules.php');

$config = [
    'id' => 'basic',
    'language' => 'en',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'schema'
    ],
    'aliases' => [
        '@bower'    => '@vendor/bower-asset',
        '@npm'      => '@vendor/npm-asset',
        '@uploads'  => '@app/web/assets/uploads',
        '@uploads_url'  => '/assets/uploads/',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '6pvkXlsnWh2d-sq-RPApSv7nsDnad_Fl',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
            ],
        ],
        'user' => [
            'class' => 'app\models\helper\UserAccessHelper',
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => '/site/login',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'viewPath' => '@app/mail',
            'transport' => $params['transport_email'] ?? [],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter'
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'hostInfo' => AA_URL,
            'class' => I18nUrlManager::class,
            'enableStrictParsing' => false,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => '/',
            'languages' => ['ru', 'en', 'uk'],
            'aliases' => ['ru' => 'ru', 'en' => 'en', 'uk' => 'uk'],
            'rules' => $rules,
        ],
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'modules' => [
        'schema' => [
            'class' => 'simialbi\yii2\schemaorg\Module',
            //'source' => 'http://schema.org/docs/full.html',
            //'autoCreate' => false,
            //'autoRender' => false
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => [
                    'custom' => '@app/modules/admin/gii/templates/crud/simple',
                ]
            ],
            'model' => [
                'class' => 'yii\gii\generators\model\Generator',
                'templates' => [
                    'custom' => '@app/modules/admin/gii/templates/model/simple',
                ]
            ]
        ],
    ];
}

return $config;
