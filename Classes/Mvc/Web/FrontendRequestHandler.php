<?php

namespace Site\Frontend\Mvc\Web;

use TYPO3\CMS\Extbase\Mvc\Web\FrontendRequestHandler as ExtbaseFrontendRequestHandler;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

class FrontendRequestHandler extends ExtbaseFrontendRequestHandler
{
    /**
     * @var ConfigurationManagerInterface
     */
    protected $configurationManager;

    /**
     * @param ConfigurationManagerInterface $configurationManager
     */
    public function injectConfigurationManager(ConfigurationManagerInterface $configurationManager)
    {
        $this->configurationManager = $configurationManager;
    }

    /**
     * Handles the web request. The response will automatically be sent to the client.
     *
     * @return \TYPO3\CMS\Extbase\Mvc\ResponseInterface|null
     */
    public function handleRequest()
    {
        return parent::handleRequest();
    }

    /**
     * This request handler can handle any web request.
     *
     * @return bool If the request is a web request, TRUE otherwise FALSE
     */
    public function canHandleRequest()
    {
        return parent::canHandleRequest();
    }

    protected function isActionCacheable(string $controllerClassName, string $actionName): bool
    {
        return parent::isActionCacheable($controllerClassName, $actionName);
    }

    /**
     * Returns the priority - how eager the handler is to actually handle the
     * request.
     *
     * @return int The priority of the request handler.
     */
    public function getPriority()
    {
        return 101;
    }
}
