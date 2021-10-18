<?php

declare(strict_types=1);

namespace Site\Frontend\Traits;

use Site\Frontend\Service\PageService;
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
    protected PageRepository $pageRepository;

    /**
     * Logic to fetch the targeted page.
     */
    protected function getPage(): array
    {
        $this->pageRepository = GeneralUtility::makeInstance(PageRepository::class);

        $rootline = $this->getPageService()->getRootLine($GLOBALS['TSFE']->id);
        $page = $this->pageRepository->getPage($rootline[0]['uid']);

        return $page;
    }

    protected function getPageService(): PageService
    {
        return GeneralUtility::makeInstance(PageService::class);
    }
}
