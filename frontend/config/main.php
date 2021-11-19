<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'name' => 'Po-polam',
    'layout'=>'popolam',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [

        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'category/<id:\d+>/page/<page:\d+>' => 'category/view',
                'category/<id:\d+>' => 'category/view',
                'product/<id:\d+>/page/<page:\d+>' => 'product/view',
                'product/<id:\d+>' => 'product/view',
                'brand/<id:\d+>' => 'brands/brand',
                'brands/' => 'brands/brands',
                'search' => 'category/search',
                'site/category/<id:\d+>/page/<page:\d+>' => 'site/category',
                'site/category/<id:\d+>' => 'site/category',
                'site/brand/<id:\d+>/page/<page:\d+>' => 'site/brand',
                'site/brand/<id:\d+>' => 'site/brand',
                'site/product/<id:\d+>' => 'site/product',
                // правило для 2, 3, 4 страницы результатов поиска
                'site/search/query/<query:.*?>/page/<page:\d+>' => 'site/search',
                // правило для первой страницы результатов поиска
                'site/search/query/<query:.*?>' => 'site/search',
                // правило для первой страницы с пустым запросом
                'site/search' => 'site/search',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
               ],
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'bundles' => [
                \yii\bootstrap4\BootstrapAsset::class => false,
                'kartik\form\ActiveFormAsset' => [
                    'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
                ],

            ]
        ]

    ],
    'params' => $params,
];
