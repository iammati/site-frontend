<?php

declare(strict_types=1);

namespace Site\Frontend\ViewHelpers\Page;

use Site\Frontend\Traits\PageTrait;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Page\PageRepository;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class FooterViewHelper extends AbstractViewHelper
{
    use PageTrait;

    /**
     * @var PageRepository
     */
    protected $pageRepository;

    public function __construct()
    {
        $this->pageRepository = GeneralUtility::makeInstance(PageRepository::class);
    }

    /**
     * The actual render logic whenever this VH gets called.
     * Handles the given arguments, generates and adds at the end.
     *
     * @return mixed|void
     */
    public function render()
    {
        $page = $this->getPage();
        $copyright = $page['copyright'];

        $this->templateVariableContainer->add('copyright', $copyright);
    }
}
