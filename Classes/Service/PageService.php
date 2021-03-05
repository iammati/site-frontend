<?php

declare(strict_types=1);

namespace Site\Frontend\Service;

use FluidTYPO3\Vhs\Service\PageService as VhsPageService;
use Site\Core\Utility\StrUtility;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Purpose for this page-trait is to handle, if necessary,
 * its parent-rootpage as sorta source-page which means it holds the logo to fetch it from there etc.
 *
 * Currently it always returns its root-page, you mind to expand/edit this inside the getPage-method.
 */
class PageService
{
    /**
     * @var PageRepository
     */
    protected $pageRepository = null;

    public function __call($methodName, $params = null)
    {
        if (StrUtility::startsWith($methodName, 'get')) {
            $methodName = str_replace('get', '', $methodName);

            return $this->getPage()[StrUtility::toSnakeCase($methodName)];
        }
    }

    /**
     * Retrieves the RootPage of the current page.
     *
     * @return array
     */
    protected function getRootPage()
    {
        $this->pageRepository = GeneralUtility::makeInstance(PageRepository::class);

        $rootline = $this->getPageService()->getRootLine($GLOBALS['TSFE']->id);
        $page = $this->pageRepository->getPage($rootline[0]['uid']);

        return $page;
    }

    /**
     * Retrieves the current page.
     *
     * @return array
     */
    protected function getPage()
    {
        $this->pageRepository = GeneralUtility::makeInstance(PageRepository::class);
        $page = $this->pageRepository->getPage($GLOBALS['TSFE']->id);

        return $page;
    }

    /**
     * @return VhsPageService
     */
    protected function getPageService()
    {
        return GeneralUtility::makeInstance(VhsPageService::class);
    }
}
