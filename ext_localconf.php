<?php

defined('TYPO3_MODE') || die('Access denied.');

(function () {
    /** @var Site\Core\Service\LocalizationService */
    $localizationService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(Site\Core\Service\LocalizationService::class);

    $localizationService->register(getenv('FRONTEND_EXT'), [
        'default' => 'Resources/Private/Language/',
    ]);
})();
