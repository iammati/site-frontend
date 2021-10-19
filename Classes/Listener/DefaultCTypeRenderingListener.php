<?php

declare(strict_types=1);

namespace Site\Frontend\Listener;

use B13\Container\DataProcessing\ContainerProcessor;
use Site\Core\Helper\ConfigHelper;
use Site\Core\Service\ModelService;
use Site\Core\Service\TcaService;
use Site\Core\Utility\IRREUtility;
use Site\Frontend\Configuration\Event\CTypeRenderingEvent;
use Symfony\Component\Finder\Finder;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class DefaultCTypeRenderingListener
{
    protected string $frontendExtKey;
    protected string $backendExt;
    protected ContainerProcessor $containerProcessor;

    public function __construct()
    {
        $this->frontendExtKey = env('FRONTEND_EXT');
        $this->backendExt = str_replace('_', '', env('BACKEND_EXT'));
        $this->containerProcessor = GeneralUtility::makeInstance(ContainerProcessor::class);
    }

    public function __invoke(CTypeRenderingEvent $event)
    {
        $cObj = $event->getCObj();
        $data = $cObj->data;

        $CType = $data['CType'];

        $autoGenerateModelRepos = ConfigHelper::get(
            $this->frontendExtKey,
            'ContentElements.rendering.autoGenerateModelRepos'
        );

        $uid = $cObj->data['uid'];

        if ($this->isCtypeIrre($CType)) {
            $cObj->renderingRootPaths = $cObj->renderingRootPaths['IRREs'];

            $dataKeys = array_keys($data);
            $irreKeys = [];

            foreach ($dataKeys as $dataKey) {
                if (str_starts_with($dataKey, 'irre_')) {
                    $irreKeys[] = $dataKey;
                }
            }

            foreach ($irreKeys as $irreKey) {
                $amountOfRecords = $data[$irreKey];

                if ($amountOfRecords > 0) {
                    $CType = getCeByCtype($data['CType'], false);
                    $tableName = "tx_{$this->backendExt}_domain_model_{$CType}";

                    // Checking if the generated $tableName exists
                    $extPath = ExtensionManagementUtility::extPath(env('BACKEND_EXT'), 'Configuration/TCA/');
                    $finder = (new Finder())
                        ->files()
                        ->in($extPath)
                        ->name("{$tableName}.php")
                    ;

                    if ($finder->hasResults()) {
                        $repositoryName = ucfirst($CType).'Repository';
                        $repositoryClass = ConfigHelper::get(
                            $this->frontendExtKey,
                            'ContentElements.rendering.RepositoryNamespace'
                        ).$repositoryName;

                        $modelNamespace = '\\Site\\SiteBackend\\Domain\\Model';
                        $modelClass = $modelNamespace.'\\'.ucfirst($CType);

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

                            $data["{$CType}_items"] = $items;
                        }
                    }
                }
            }
        }

        $cObj->data = $data;

        $event->setCObj($cObj);
    }

    private function isCtypeIrre(string $CType): bool
    {
        $ce = strtolower(getCeByCtype($CType));

        $extPath = ExtensionManagementUtility::extPath(
            env('BACKEND_EXT'),
            "Configuration/TCA/tx_{$this->backendExt}_domain_model_{$ce}.php"
        );

        return file_exists($extPath);
    }
}
