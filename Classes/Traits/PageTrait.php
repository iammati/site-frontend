<?php

declare(strict_types=1);

namespace Site\Frontend\Traits;

use FluidTYPO3\Vhs\Service\PageService;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Purpose for this page-trait is to handle, if necessary,
 * its parent-rootpage as sorta source-page which means it holds the logo to fetch it from there etc.
 *
 * Currently it always returns its root-page, you mind to expand/edit this inside the getPage-method.
 */
trait PageTrait
{
    /**
     * @var PageRepository
     */
    protected $pageRepository = null;

    /**
     * Logic to fetch the targeted page.
     *
     * @return array
     */
    protected function getPage()
    {
        $this->pageRepository = GeneralUtility::makeInstance(PageRepository::class);

        $rootline = $this->getPageService()->getRootLine($GLOBALS['TSFE']->id);
        $page = $this->pageRepository->getPage($rootline[0]['uid']);

        return $page;
    }

    /**
     * @return PageService
     */
    protected function getPageService()
    {
        return GeneralUtility::makeInstance(PageService::class);
    }
}
