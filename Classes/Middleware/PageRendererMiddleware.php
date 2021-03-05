<?php

declare(strict_types=1);

namespace Site\Frontend\Middleware;

/*
 * This file is part of TYPO3 CMS-based extension 'JustInCase' by b13.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Site\Frontend\Service\PageService;
use Site\Frontend\Traits\PageTrait;
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
    /**
     * @var PageRenderer
     */
    protected $pageRenderer;

    /**
     * @var PageService
     */
    protected $pageService;

    public function __construct()
    {
        $this->pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $this->pageService = GeneralUtility::makeInstance(PageService::class);
    }

    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface {
        $this->pageRenderer->setCharSet('UTF-8');
        $this->pageRenderer->setTitle($this->pageService->getTitle());

        return $handler->handle($request);
    }
}
