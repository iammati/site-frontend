<?php

use TYPO3\CMS\IndexedSearch\Hook\TypoScriptFrontendHook;

if (!function_exists('getFrontend')) {
    function getFrontend(): ?TypoScriptFrontendHook
    {
        return $GLOBALS['TSFE'];
    }
}
