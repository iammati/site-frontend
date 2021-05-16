<?php

declare(strict_types=1);

namespace Site\Frontend\Event\Rendering;

use B13\Container\DataProcessing\ContainerProcessor;
use Site\Core\Utility\StrUtility;
use Site\Frontend\Interfaces\CTypeRenderingInterface;
use Site\Frontend\Page\Rendering\CTypeRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class ContainerRenderingEvent implements CTypeRenderingInterface
{
    /**
     * @var ContainerProcessor
     */
    protected $containerProcessor;

    /**
     * @var CTypeRenderer
     */
    protected $CTypeRenderer;

    public function __construct()
    {
        $this->containerProcessor = GeneralUtility::makeInstance(ContainerProcessor::class);
        $this->CTypeRenderer = GeneralUtility::makeInstance(CTypeRenderer::class);
    }

    public function beforeRendering(ContentObjectRenderer &$cObj)
    {
        $cObj->renderingRootPaths['Templates'] .= 'Containers/';

        $cObj->data = array_merge(
            $cObj->data,
            $this->containerProcessor->process($cObj, [], [], []),
        );

        $childrens = array_filter($cObj->data, function ($key) {
            if (StrUtility::startsWith($key, 'children_')) {
                return $key;
            }
        }, ARRAY_FILTER_USE_KEY);

        foreach ($childrens as $childKey => $records) {
            foreach ($records as $recKey => $record) {
                $CType = getCeByCtype($record['CType']);
                $renderedContent = $record['renderedContent'];

                if ($record['renderedContent'] == '') {
                    $this->CTypeRenderer->cObj = $cObj;
                    $renderedContent = $this->CTypeRenderer->renderCObj($CType);

                    $cObj->data[$childKey][$recKey]['renderedContent'] = $renderedContent;
                }
            }
        }

        return $cObj;
    }

    public function afterRendering(ContentObjectRenderer &$cObj)
    {
        return $cObj;
    }
}
