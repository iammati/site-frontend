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
    ],
];
