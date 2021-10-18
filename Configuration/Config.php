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
            'autoGenerateModelRepos' => true,
            'EventNamespace' => 'Site\\Frontend\\Event\\Rendering\\',
            'RepositoryNamespace' => 'Site\\SiteBackend\\Domain\\Repository\\',
        ],
    ],

    'header' => [
        'main' => env('HEADER_PID'),
    ],

    'footer' => [
        'main' => env('FOOTER_PID'),
    ],
];
