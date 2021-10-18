<?php

declare(strict_types=1);

namespace Site\Frontend\Service;

use Site\Core\Utility\StrUtility;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\RootlineUtility;

/**
 * Purpose for this page-trait is to handle, if necessary,
 * its parent-rootpage as sorta source-page which means it holds the logo to fetch it from there etc.
 *
 * Currently it always returns its root-page, you mind to expand/edit this inside the getPage-method.
 */
class PageService
{
    protected static array $cachedRootlines = [];
    protected PageRepository $pageRepository;

    public function __call($methodName, $params = null)
    {
        if (StrUtility::startsWith($methodName, 'get')) {
            $methodName = str_replace('get', '', $methodName);

            return $this->getPage()[StrUtility::toSnakeCase($methodName)];
        }
    }

    /**
     * Retrieves the RootPage of the current page.
     */
    protected function getRootPage(): array
    {
        $this->pageRepository = GeneralUtility::makeInstance(PageRepository::class);

        $rootline = $this->getRootLine($GLOBALS['TSFE']->id);
        $page = $this->pageRepository->getPage($rootline[0]['uid']);

        return $page;
    }

    /**
     * Retrieves the current page.
     */
    protected function getPage(): array
    {
        $this->pageRepository = GeneralUtility::makeInstance(PageRepository::class);
        $page = $this->pageRepository->getPage($GLOBALS['TSFE']->id);

        return $page;
    }
    
    public function getRootLine(int $pageUid = null, bool $reverse = false, bool $disableGroupAccessCheck = false): array
    {
        if (null === $pageUid) {
            $pageUid = $GLOBALS['TSFE']->id;
        }

        $cacheKey = md5($pageUid.(int)$reverse.(int)$disableGroupAccessCheck);

        if (false === isset(static::$cachedRootlines[$cacheKey])) {
            if (class_exists(RootlineUtility::class)) {
                $rootline = (new RootlineUtility($pageUid))->get();
            } elseif (method_exists($this->pageRepository, 'getRootLine')) {
                if (true === (bool)$disableGroupAccessCheck) {
                    $this->pageRepository->where_groupAccess = '';
                }

                $rootline = $this->getRootLine($pageUid);
            } else {
                $rootline = [];
            }

            if (true === $reverse) {
                $rootline = array_reverse($rootline);
            }

            static::$cachedRootlines[$cacheKey] = $rootline;
        }

        return static::$cachedRootlines[$cacheKey];
    }
}
