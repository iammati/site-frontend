<?php

declare(strict_types=1);

namespace Site\Frontend\Helper;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

class RenderingHelper
{
    public static function isCtypeIrre(string $CType): bool
    {
        $backendExtKey = str_replace('_', '', env('BACKEND_EXT'));
        $ce = strtolower(getCeByCtype($CType));

        $extPath = ExtensionManagementUtility::extPath(
            env('BACKEND_EXT'),
            "Configuration/TCA/tx_{$backendExtKey}_domain_model_{$ce}.php"
        );

        return file_exists($extPath);
    }
}
