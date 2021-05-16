<?php

declare(strict_types=1);

namespace Site\Frontend\Page\Rendering;

use Site\Core\Helper\ConfigHelper;
use Site\Core\Utility\StandaloneViewUtility;
use Site\Core\Utility\StrUtility;
use Site\Frontend\Event\Rendering\RenderingEvent;
use Site\Frontend\Interfaces\CTypeRenderingInterface;
use Site\SiteBackend\Domain\Repository\TtcontentRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Fluid\View\StandaloneView;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * This CType class gets called by tt_content.default via USER_INT.
 * Approach is it to render custom content-elements by getting their CType
 * and resolving the correct fluidtemplate for it.
 *
 * It's also possible to listen for rendering-events to make calls of custom
 * DataProcessors - see for that any \Site\Frontend\Event\<CType>RenderingEvent::class.
 */
class CTypeRenderer
{
    /**
     * @var ContentObjectRenderer
     */
    public $cObj;

    /**
     * @var string
     */
    protected $frontendExtKey;

    /**
     * @var RenderingEvent
     */
    protected $defaultRenderingEvent;

    /**
     * @var string
     */
    protected $defaultRootPathsIdentifier = 'ContentElements.rootPaths';

    /**
     * @var TtcontentRepository
     */
    protected $ttcontentRepository;

    /**
     * @var DataMapper
     */
    protected $dataMapper;

    /**
     * Inject the DataMapper
     *
     * @param DataMapper $dataMapper
     */
    public function injectDataMapper(DataMapper $dataMapper)
    {
        $this->dataMapper = $dataMapper;
    }

    /**
     * Construction for each tt_content.CType rendering.
     */
    public function __construct()
    {
        $this->frontendExtKey = env('FRONTEND_EXT');
        $this->defaultRenderingEvent = GeneralUtility::makeInstance(RenderingEvent::class);
        $this->ttcontentRepository = GeneralUtility::makeInstance(TtcontentRepository::class);
    }

    /**
     * Method to be called when a CType gets rendered without a default.
     * The rendering-method reads out its CType and trys to resolve the Template-Name
     * prefixed with the configured rootPaths.
     *
     * @return string
     */
    public function render()
    {
        $uid = $this->cObj->data['uid'];
        $record = $this->ttcontentRepository->findByUid($uid);

        $CType = $this->cObj->data['CType'];
        $templateCType = getCeByCtype($CType);

        $this->resolveRenderingRootPaths();

        // Calling the default and custom before rendering events
        $this->defaultRenderingEvent->beforeRendering($this->cObj);
        $this->renderingEvent($templateCType, 'beforeRendering');

        // Rendering the cObj by its rootPaths using $templateCType as the template name
        $this->renderCObj($templateCType);

        // Calling the default and custom after rendering events
        $this->renderingEvent($templateCType, 'afterRendering');
        $this->defaultRenderingEvent->afterRendering($this->cObj);

        if ($this->cObj->renderedView === null) {
            // What happens here?
            // dd($this->cObj);
        }

        return trim($this->cObj->renderedView);
    }

    /**
     * Caller of the RenderingEvent (before and after).
     *
     * @return ContentObjectRenderer
     */
    public function renderingEvent(string $templateCType, string $method)
    {
        $namespaceIdentifier = 'ContentElements.rendering.EventNamespace';
        $namespace = ConfigHelper::get($this->frontendExtKey, $namespaceIdentifier);

        if (null === $namespace) {
            throw new \UnexpectedValueException(sprintf(
                'Namespace has not been configured in EXT:%s/Configuration/Config.php:%s',
                $this->frontendExtKey,
                $namespaceIdentifier
            ));
        }

        $eventNamespace = $namespace . $templateCType . 'RenderingEvent';

        if (StrUtility::startsWith($templateCType, 'Container-')) {
            $eventNamespace = $namespace . 'ContainerRenderingEvent';
        }

        if (class_exists($eventNamespace)) {
            $eventClass = GeneralUtility::makeInstance($eventNamespace, $this->cObj);

            if (!$eventClass instanceof CTypeRenderingInterface) {
                throw new \UnexpectedValueException(sprintf(
                    'The %s namespace requires to implement the \Site\Frontend\Interfaces\CTypeRenderingInterface',
                    $eventNamespace
                ));
            }

            $this->cObj = $eventClass->{$method}($this->cObj);
        }

        return $this->cObj;
    }

    /**
     * @param string $templateCType Template name e.g. 'Headerrte' or 'Textimage' etc.
     *
     * @return void
     */
    public function renderCObj(string $templateCType)
    {
        // Rendering the view by the $rootPaths using $templateCType as Template-Name
        $this->cObj->renderedView = StandaloneViewUtility::render(
            $this->cObj->renderingRootPaths,
            $templateCType . '.html',
            [
                'data' => $this->cObj->data,
                'cObj' => $this->cObj,
            ],
        );

        if ($this->cObj->renderedView === null) {
            $view = new StandaloneView($this->cObj);
            $view->setTemplateSource('<f:debug inline="1">' . sprintf('Looks like the CType %s has an empty template. Please make sure you templated it correctly else it keeps returning a null.', $templateCType) . '</f:debug>');
            $this->cObj->renderedView = $view->render();
        }
    }

    /**
     * @return void
     */
    protected function resolveRenderingRootPaths()
    {
        $rootPathsIdentifier = $this->defaultRootPathsIdentifier;

        if ($this->cObj->data['is_irre']) {
            $rootPathsIdentifier .= '.IRREs';
        }

        $this->cObj->renderingRootPaths = ConfigHelper::get($this->frontendExtKey, $rootPathsIdentifier);
    }
}
