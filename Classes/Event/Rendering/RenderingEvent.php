<?php

declare(strict_types=1);

namespace Site\Frontend\Event\Rendering;

use Site\Core\Helper\ConfigHelper;
use Site\Core\Service\ModelService;
use Site\Core\Service\TcaService;
use Site\Core\Utility\IRREUtility;
use Site\Core\Utility\StrUtility;
use Site\Frontend\Interfaces\CTypeRenderingInterface;
use Symfony\Component\Finder\Finder;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class RenderingEvent implements CTypeRenderingInterface
{
    public function beforeRendering(ContentObjectRenderer &$cObj): ContentObjectRenderer
    {
        $backendExt = str_replace('_', '', env('BACKEND_EXT'));
        $autoGenerateModelRepos = ConfigHelper::get(env('FRONTEND_EXT'), 'ContentElements.rendering.autoGenerateModelRepos');

        $uid = $cObj->data['uid'];

        if ($this->isCtypeIrre($cObj->data['CType'])) {
            $cObj->renderingRootPaths = $cObj->renderingRootPaths['IRREs'];

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
                    $tableName = 'tx_'.$backendExt.'_domain_model_'.$CType;

                    // Checking if the generated $tableName exists
                    $extPath = ExtensionManagementUtility::extPath(env('BACKEND_EXT'), 'Configuration/TCA/');
                    $finder = (new Finder())->files()->in($extPath)->name($tableName . '.php');

                    if ($finder->hasResults()) {
                        $repositoryName = ucfirst($CType) . 'Repository';
                        $repositoryClass = ConfigHelper::get(env('FRONTEND_EXT'), 'ContentElements.rendering.RepositoryNamespace') . $repositoryName;

                        $modelNamespace = '\\Site\\SiteBackend\\Domain\\Model';
                        $modelClass = $modelNamespace . '\\' . ucfirst($CType);

                        if (
                            // if config enabled the autogeneration
                            $autoGenerateModelRepos === true &&
                            (
                                // check for repository & model existance
                                !class_exists($repositoryClass) ||
                                !class_exists($modelClass)
                            )
                        ) {
                            $modelNamespace = mb_substr($modelNamespace, 1, mb_strlen($modelNamespace));

                            $columns = $GLOBALS['TCA'][$tableName]['config']['columns'];
                            $modelProperties = TcaService::config2properties($columns);

                            ModelService::generate(
                                env('BACKEND_EXT'),
                                $modelNamespace,
                                ucfirst($CType),
                                $modelProperties
                            );
                        }

                        if (class_exists($repositoryClass)) {
                            $items = IRREUtility::resolveByRepository(
                                $uid,
                                $tableName,
                                'parentid',
                                GeneralUtility::makeInstance($repositoryClass)
                            );

                            $cObj->data[$CType.'_items'] = $items;
                        }
                    }
                }
            }
        }

        return $cObj;
    }

    public function afterRendering(ContentObjectRenderer &$cObj): ContentObjectRenderer
    {
        return $cObj;
    }

    /**
     * @param string $ctype
     *
     * @return bool
     */
    public function isCtypeIrre($ctype): bool
    {
        $ce = strtolower(getCeByCtype($ctype));

        $backendExt = str_replace('_', '', env('BACKEND_EXT'));
        $extPath = ExtensionManagementUtility::extPath(env('BACKEND_EXT'), 'Configuration/TCA/tx_' . $backendExt . '_domain_model_' . $ce . '.php');

        return file_exists($extPath);
    }
}
