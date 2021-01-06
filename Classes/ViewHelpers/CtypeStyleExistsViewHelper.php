<?php

declare(strict_types=1);

namespace Site\Frontend\ViewHelpers;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * This ViewHelper determines whether the given CType has
 * for its own content element a .css file or not.
 */
class CtypeStyleExistsViewHelper extends AbstractViewHelper
{
    /**
     * Initialization of required arguments for this ViewHelper.
     *
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('ctype', 'string', 'The CType of a content element.', true);
    }

    /**
     * The actual render logic whenever this VH gets called.
     * Handles the given arguments, generates and adds at the end.
     *
     * @return void
     */
    public function render()
    {
        $ctype = $this->arguments['ctype'];
        $path = ExtensionManagementUtility::extPath(getenv('FRONTEND_EXT'), 'Resources/Public/ContentElements/css/'.$ctype.'.css');

        return file_exists($path);
    }
}
