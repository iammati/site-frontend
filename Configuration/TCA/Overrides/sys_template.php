<?php

defined('TYPO3_MODE') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    getenv('FRONTEND_EXT'),
    'Configuration/TypoScript',
    'Site - Frontend'
);
