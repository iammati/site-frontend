<?php

declare(strict_types=1);

namespace Site\Frontend\Listener\CTypes;

use B13\Container\DataProcessing\ContainerProcessor;
use Site\Frontend\Configuration\Event\CTypeRenderingEvent;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ContainerRenderingListener
{
    protected ContainerProcessor $containerProcessor;

    public function __construct()
    {
        $this->containerProcessor = GeneralUtility::makeInstance(ContainerProcessor::class);
    }

    public function __invoke(CTypeRenderingEvent $event)
    {
        $cObj = $event->getCObj();
        $data = $cObj->data;

        $CType = $data['CType'];

        if (str_starts_with($CType, 'container-') && str_ends_with($CType, 'col')) {
            $cObj->renderingRootPaths['Templates'] .= 'Containers/';

            $cObj->data = array_merge(
                $data,
                $this->containerProcessor->process($cObj, [], [], []),
            );

            $childrens = array_filter($cObj->data, function ($key) {
                if (str_starts_with($key, 'children_')) {
                    return $key;
                }
            }, ARRAY_FILTER_USE_KEY);

            foreach ($childrens as $childKey => $records) {
                foreach ($records as $recKey => $record) {
                    $CType = getCeByCtype($record['CType']);
                    $renderedContent = $record['renderedContent'];

                    if ($record['renderedContent'] === '') {
                        $this->CTypeRenderer->cObj = $cObj;
                        $renderedContent = $this->CTypeRenderer->renderCObj($CType);
                    }

                    $data[$childKey][$recKey]['renderedContent'] = $renderedContent;
                }
            }
        }

        $cObj->data = $data;

        $event->setCObj($cObj);
    }
}
