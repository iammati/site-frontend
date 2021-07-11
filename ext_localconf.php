<?php

(function () {
    include TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('site_frontend', 'helpers.php');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptConstants(trim("
        @import 'EXT:site_frontend/Configuration/TypoScript/constants.typoscript'
    "));

    /** @var Site\Core\Service\LocalizationService */
    $localizationService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(Site\Core\Service\LocalizationService::class);

    $localizationService->register(env('FRONTEND_EXT'), [
        'default' => 'Resources/Private/Language/',
    ]);

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
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
}
            '
        );
})();
