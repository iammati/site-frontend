<?php

namespace Site\Frontend\ViewHelpers;

use Site\Core\Utility\ExceptionUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * This ViewHelper determines whether the given CType has
 * for its own content element a .css file or not.
 */
class TranslateViewHelper extends AbstractViewHelper
{
    /**
     * Initialization of required arguments for this ViewHelper.
     *
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('extKey', 'string', 'Optional, by default it takes the "FRONTEND_EXT" from the .env file. Extension key provided as snake_case.', false);
        $this->registerArgument('identifier', 'string', 'The identifier passed as e.g. "Frontend.Test:key".', true);
    }

    /**
     * The actual render logic whenever this VH gets called.
     * Handles the given arguments, generates and adds at the end.
     *
     * @return mixed
     *
     * @throws ExceptionUtility
     */
    public function render()
    {
        $extKey = $this->arguments['extKey'] ?? env('FRONTEND_EXT');
        $identifier = $this->arguments['identifier'];

        $language = serverRequest()->getAttribute('language');
        $twoLetterIsoCode = $language->getTwoLetterIsoCode();

        return ll($extKey, $identifier, $twoLetterIsoCode);
    }
}
