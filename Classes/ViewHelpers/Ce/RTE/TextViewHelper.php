<?php

declare(strict_types=1);

namespace Site\Frontend\ViewHelpers\Ce\RTE;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class TextViewHelper extends AbstractViewHelper
{
    /**
     * Initialization of required arguments for this ViewHelper.
     *
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('value', 'string', 'The height-value passed as 0 or 1.', true);
    }

    /**
     * The actual render logic whenever this VH gets called.
     * Handles the given arguments, generates and adds at the end.
     *
     * @return mixed|void
     */
    public function render()
    {
        $value = $this->arguments['value'];

        $value = str_replace('a', '<font color="red">a</font>', $value);

        return $value;
    }
}
