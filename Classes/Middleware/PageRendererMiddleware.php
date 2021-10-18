<?php

declare(strict_types=1);

namespace Site\Frontend\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Site\Frontend\Service\PageService;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Middleware to manipulate dynamically page properties as in:
 * - Favicon
 * - Title
 * - CSS / JS
 * - or anything else the PageRenderer class offers.
 */
class PageRendererMiddleware implements MiddlewareInterface
{
    protected PageRenderer $pageRenderer;
    protected PageService $pageService;

    public function __construct()
    {
        $this->pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $this->pageService = GeneralUtility::makeInstance(PageService::class);
    }

    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface {
        $this->pageRenderer->setTitle($this->pageService->getTitle());
        $this->pageRenderer->setCharSet('UTF-8');

        $this->pageRenderer->setMetaTag(
            'name',
            'viewport',
            'user-scalable=no, width=device-width, initial-scale=1.0'
        );

        $this->pageRenderer->addCssFile('EXT:site_frontend/Resources/Public/Css/app.min.css');

        $this->pageRenderer->addJsFile(
            $file = 'EXT:site_frontend/Resources/Public/JavaScript/app.min.js',
            $type = 'text/javascript', $compress = true, $forceOnTop = false,
            $allWrap = '', $excludeFromConcatenation = false, $splitChar = '|',
            $async = true, $integrity = '', $defer = true,
            $crossorigin = '', $nomodule = false
        );

        return $handler->handle($request);
    }
}
