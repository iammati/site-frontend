<?php

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    env('FRONTEND_EXT'),
    'Configuration/TypoScript',
    'Site - Frontend'
);
