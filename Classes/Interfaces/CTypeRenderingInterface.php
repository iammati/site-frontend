<?php

declare(strict_types=1);

namespace Site\Frontend\Interfaces;

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

interface CTypeRenderingInterface
{
    /**
     * Event-Listener before the default rendering via Standalone
     * gets called - you might want to change dynamically here some data.
     *
     * @param ContentObjectRenderer $cObj
     *
     * @return ContentObjectRenderer
     */
    public function beforeRendering(ContentObjectRenderer &$cObj): ContentObjectRenderer;

    /**
     * Event-Listener after the default rendering via Standalone
     * has been called - you might want to change some data afterwards here.
     *
     * @param ContentObjectRenderer $cObj
     *
     * @return ContentObjectRenderer
     */
    public function afterRendering(ContentObjectRenderer &$cObj): ContentObjectRenderer;
}
