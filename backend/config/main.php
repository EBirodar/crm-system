<?php
require(__DIR__ . '/../../common/components/helpers/GlobalFunctions.php');
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name' => 'Starter Kit - Admin Panel',
    'language' => 'uz',
    'sourceLanguage' => 'en',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'catalog' => [
            'class' => 'backend\modules\catalog\Module',
        ],
        'group' => [
            'class' => 'backend\modules\group\Module',
        ],
    ],
    'components' => [
        'request' => [
            'baseUrl' => '/admin',
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'backendUrlManager' => require __DIR__ . '/UrlManager.php',
        'urlManager' => function () {
            return Yii::$app->get('backendUrlManager');
        },
    ], // components

    'params' => $params,
];
