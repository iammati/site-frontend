<?php

$frontendExtKey = env('FRONTEND_EXT');

return [
    'ContentElements' => [
        'rootPaths' => [
            'Templates' => 'EXT:' . $frontendExtKey . '/Resources/Private/Fluid/Content/Templates/',
            'Partials' => 'EXT:' . $frontendExtKey . '/Resources/Private/Fluid/Content/Partials/',
            'Layouts' => 'EXT:' . $frontendExtKey . '/Resources/Private/Fluid/Content/Layouts/',

            'IRREs' => [
                'Templates' => 'EXT:' . $frontendExtKey . '/Resources/Private/Fluid/Content/Templates/IRREs/',
                'Partials' => 'EXT:' . $frontendExtKey . '/Resources/Private/Fluid/Content/Partials/',
                'Layouts' => 'EXT:' . $frontendExtKey . '/Resources/Private/Fluid/Content/Layouts/',
            ],
        ],

        'rendering' => [
            'EventNamespace' => 'Site\\Frontend\\Event\\Rendering\\',
            'RepositoryNamespace' => 'Site\\SiteBackend\\Domain\\Repository\\',
        ],
    ],

    'header' => [
        'pid' => env('HEADER_PID'),
        'main' => env('PID_HEADER'),
    ],

    'footer' => [
        'pid' => env('FOOTER_PID'),
        'main' => env('PID_FOOTER_MAIN'),
        'meta' => env('PID_FOOTER_META'),
    ],

    'contentElements' => [
        'contactFormPid' => env('PID_CE_CONTACTFORM'),
    ],
];
