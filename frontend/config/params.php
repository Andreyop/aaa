<?php
return [
    'params' => [
        'bsDependencyEnabled' => false,
    ],
    'bsVersion' => '4.x',
    'adminEmail' => 'admin@example.com',

  // this will not load Bootstrap CSS and JS for all Krajee extensions
        // you need to ensure you load the Bootstrap CSS/JS manually in your view layout before Krajee CSS/JS assets
        //
        // other params settings below
        // 'bsVersion' => '5.x',
        // 'adminEmail' => 'admin@example.com'

// ...
    'components' => ['components' => [
        'assetManager' => ['assetManager' => [
            'bundles' => ['bundles' => [
                'kartik\form\ActiveFormAsset' => ['kartik\form\ActiveFormAsset' => [
                    'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
                ],],
            ],],
        ],],
    ],],







    ];
