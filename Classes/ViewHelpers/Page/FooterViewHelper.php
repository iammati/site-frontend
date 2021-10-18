<?php

declare(strict_types=1);

namespace Site\Frontend\ViewHelpers\Page;

use Site\Frontend\Traits\PageTrait;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class FooterViewHelper extends AbstractViewHelper
{
    use PageTrait;

    public function render(): void
    {
        $page = $this->getPage();
        $copyright = $page['copyright'];

        $this->templateVariableContainer->add('copyright', $copyright);
    }
}
