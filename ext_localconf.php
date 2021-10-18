<?php

use Site\Core\Service\LocalizationService;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

(function () {
    include ExtensionManagementUtility::extPath('site_frontend', 'helpers.php');

    /** @var LocalizationService */
    $localizationService = GeneralUtility::makeInstance(LocalizationService::class);

    $localizationService->register(env('FRONTEND_EXT'), [
        'default' => 'Resources/Private/Language/',
    ]);

    ExtensionManagementUtility::addTypoScriptSetup(
        '
# Content element rendering
tt_content.default >
tt_content {
    key {
        field = CType
    }

    default = USER_INT
    default {
        userFunc = Site\Frontend\Page\Rendering\CTypeRenderer->render
    }
}'
    );

    // Global namespace registration for 'site' => 'Site\Frontend\ViewHelpers'
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces']['site'] = [
        'Site\Frontend\ViewHelpers',
    ];
})();
