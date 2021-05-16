<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Site-Frontend',
    'description' => 'The frontend extension for new applications.',
    'category' => 'fe',
    'author' => 'Mati',
    'author_email' => 'mati_01@icloud.com',
    'state' => 'stable',
    'author' => 'Frontend',
    'constraints' => [
        'conflicts' => [],
        'suggests' => [],

        'depends' => [
            'site_core' => '*',
        ],
    ],
];
