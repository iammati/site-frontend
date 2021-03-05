<?php

use Site\Frontend\Middleware;

return [
    'frontend' => [
        'site-frontend/lowercase-uri' => [
            'target' => Middleware\LowerCaseUriMiddleware::class,

            'after' => [
                'typo3/cms-frontend/site-resolver',
            ],

            'before' => [
                'typo3/cms-frontend/base-redirect-resolver',
            ],
        ],

        'site-frontend/pagerenderer' => [
            'target' => Middleware\PageRendererMiddleware::class,

            'after' => [
                'typo3/cms-frontend/prepare-tsfe-rendering',
            ],

            'before' => [
                'typo3/cms-frontend/shortcut-and-mountpoint-redirect',
            ],
        ],
    ],
];
