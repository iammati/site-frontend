<?php

declare(strict_types=1);

namespace Site\Frontend\ViewHelpers\Page;

use Site\Core\Utility\FileUtility;
use Site\Frontend\Traits\PageTrait;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class HeaderViewHelper extends AbstractViewHelper
{
    use PageTrait;

    /**
     * The actual render logic whenever this VH gets called.
     * Handles the given arguments, generates and adds at the end.
     *
     * @return mixed|void
     */
    public function render()
    {
        $fallbackLogo = FileUtility::findFilesBy(1, 'pages', 'logo');

        $page = $this->getPage();
        $logo = FileUtility::findFilesBy($page['uid'], 'pages', 'logo');

        if (!is_array($logo) || empty($logo)) {
            $logo = $fallbackLogo;
        }

        if (is_array($logo)) {
            $this->templateVariableContainer->add('logo', $logo[0] ?? null);
        }
    }
}
