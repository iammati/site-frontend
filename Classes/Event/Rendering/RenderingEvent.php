<?php

declare(strict_types=1);

namespace Site\Frontend\Event\Rendering;

use Site\Core\Helper\ConfigHelper;
use Site\Core\Utility\IRREUtility;
use Site\Core\Utility\StrUtility;
use Site\Frontend\Interfaces\CTypeRenderingInterface;
use Symfony\Component\Finder\Finder;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class RenderingEvent implements CTypeRenderingInterface
{
    public function beforeRendering(ContentObjectRenderer &$cObj)
    {
        $uid = $cObj->data['uid'];
        $isIrre = $cObj->data['is_irre'];

        if ($isIrre) {
            $data = $cObj->data;

            $dataKeys = array_keys($data);
            $irreKeys = [];

            foreach ($dataKeys as $dataKey) {
                if (StrUtility::startsWith($dataKey, 'irre_')) {
                    $irreKeys[] = $dataKey;
                }
            }

            foreach ($irreKeys as $irreKey) {
                $amountOfRecords = $data[$irreKey];

                if ($amountOfRecords > 0) {
                    $CType = getCeByCtype($data['CType'], false);
                    $tableName = 'tx_' . str_replace('_', '', env('BACKEND_EXT')) . '_domain_model_' . $CType;

                    // Checking if the generated $tableName exists
                    $extPath = ExtensionManagementUtility::extPath(env('BACKEND_EXT'), 'Configuration/TCA/');
                    $finder = (new Finder())->files()->in($extPath)->name($tableName . '.php');

                    if ($finder->hasResults()) {
                        $repositoryName = ucfirst($CType) . 'Repository';
                        $repositoryClass = ConfigHelper::get(env('FRONTEND_EXT'), 'ContentElements.rendering.RepositoryNamespace') . $repositoryName;

                        $items = IRREUtility::resolveByRepository(
                            $uid,
                            $tableName,
                            'parentid',
                            GeneralUtility::makeInstance($repositoryClass)
                        );

                        $cObj->data[$CType . '_items'] = $items;
                    }
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
