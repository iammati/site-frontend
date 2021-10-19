<?php

declare(strict_types=1);

namespace Site\Frontend\Page\Rendering;

use Site\Core\Helper\ConfigHelper;
use Site\Core\Utility\StandaloneViewUtility;
use Site\Frontend\Configuration\Event\CTypeRenderingEvent;
use Site\Frontend\Helper\RenderingHelper;
use Site\SiteBackend\Domain\Repository\TtcontentRepository;
use TYPO3\CMS\Core\EventDispatcher\EventDispatcher;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * This CType class gets called by tt_content.default via USER_INT.
 * USER_INT = If you create this object as USER_INT, it will be rendered non-cached, outside the main page-rendering.
 *
 * Approach is to render custom content-elements by getting their CType
 * and resolving the correct Fluidtemplate by that to uppercase the first
 * letter of the current processing CType (e.g. header -> Header).
 */
class CTypeRenderer
{
    public ContentObjectRenderer $cObj;

    protected string $frontendExtKey;
    protected string $defaultRootPathsIdentifier = 'ContentElements.rootPaths';

    protected TtcontentRepository $ttcontentRepository;
    protected EventDispatcher $eventDispatcher;

    public function __construct(
        TtcontentRepository $ttcontentRepository,
        EventDispatcher $eventDispatcher
    ) {
        $this->frontendExtKey = env('FRONTEND_EXT');
        $this->ttcontentRepository = $ttcontentRepository;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * Method to be called when a CType gets rendered without a default.
     * The rendering-method reads out its CType and trys to resolve the Template-Name
     * prefixed with the configured rootPaths.
     */
    public function render(): string
    {
        $request = serverRequest();

        $queryParams = $request->getQueryParams();
        $emptyPage = (bool) ($queryParams['tx_news_pi1']['emptyPage'] || $queryParams['emptyPage']);

        if ($emptyPage) {
            return false;
        }

        $uid = $this->cObj->data['uid'];

        $CType = $this->cObj->data['CType'];
        $templateCType = getCeByCtype($CType);

        $this->resolveRenderingRootPaths();

        // Calling the default and custom before rendering events
        $this->renderingEvent($templateCType, 'beforeRendering');

        $repository = $this->ttcontentRepository;

        if (null !== $this->cObj->repositoryClass) {
            $repository = $this->cObj->repositoryClass;
        }

        if ($repository instanceof TtcontentRepository) {
            $record = $repository->findByUid($this->cObj->data['uid']);
            $this->cObj->record = $record;
        }

        $this->cObj->repository = $repository;

        // Rendering the cObj by its rootPaths using $templateCType as the template name
        $this->renderCObj($templateCType);

        // Triggering PSR-15 event dispatcher
        $this->renderingEvent($templateCType, 'afterRendering');

        return trim($this->cObj->renderedView);
    }

    /**
     * Dispatcher for the PSR-15 CTypeRenderingEvent.
     */
    public function renderingEvent(string $templateCType, string $method): ContentObjectRenderer
    {
        $this->cObj = $this->eventDispatcher->dispatch(new CTypeRenderingEvent($this->cObj, $method))->getCObj();

        return $this->cObj;
    }

    /**
     * @param string $templateCType Template name e.g. 'Headerrte' or 'Textimage' etc.
     */
    public function renderCObj(string $templateCType): string
    {
        if ($this->cObj->renderingRootPaths === null) {
            $this->resolveRenderingRootPaths();
        }

        // Rendering the view by the $rootPaths using $templateCType as Template-Name
        $this->cObj->renderedView = StandaloneViewUtility::render(
            $this->cObj->renderingRootPaths,
            $templateCType.'.html',
            [
                'cObj' => $this->cObj,
                'data' => $this->cObj->data,
                'record' => $this->cObj->record,
            ],
        );

        if (null === $this->cObj->renderedView) {
            $view = new StandaloneView($this->cObj);
            $view->setTemplateSource('<f:debug inline="1">'.sprintf('Looks like the CType %s has an empty template. Please make sure you templated it correctly else it keeps returning a null.', $templateCType).'</f:debug>');
            $this->cObj->renderedView = $view->render();
        }

        return $this->cObj->renderedView;
    }

    public function resolveRenderingRootPaths(): void
    {
        $rootPathsIdentifier = $this->defaultRootPathsIdentifier;

        if (RenderingHelper::isCtypeIrre($this->cObj->data['CType'])) {
            $rootPathsIdentifier .= '.IRREs';
        }

        $rootPaths = ConfigHelper::get($this->frontendExtKey, $rootPathsIdentifier);

        $this->cObj->renderingRootPaths = $rootPaths;
    }
}
