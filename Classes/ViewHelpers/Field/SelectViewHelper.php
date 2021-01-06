<?php

declare(strict_types=1);

namespace Site\Frontend\ViewHelpers\Field;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * This ViewHelper is for the Default-Layout when rendering a Content-Element.
 * It handles and generates the classes to have a cleaner view.
 */
class SelectViewHelper extends AbstractViewHelper
{
    /**
     * Initialization of required arguments for this ViewHelper.
     *
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('value', 'string', 'The value represented by the select-field.', true);
    }

    /**
     * The actual render logic whenever this VH gets called.
     * Handles the given arguments, generates and adds at the end.
     *
     * @return void
     */
    public function render()
    {
        dd($this->arguments);
    }
}
