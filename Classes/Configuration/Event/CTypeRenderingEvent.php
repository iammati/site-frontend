<?php

declare(strict_types=1);

namespace Site\Frontend\Configuration\Event;

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

final class CTypeRenderingEvent
{
    protected ContentObjectRenderer $cObj;

    public function __construct(ContentObjectRenderer $cObj)
    {
        $this->cObj = $cObj;
    }

    public function setCObj(ContentObjectRenderer $cObj): self
    {
        $this->cObj = $cObj;

        return $this;
    }

    public function getCObj(): ContentObjectRenderer
    {
        return $this->cObj;
    }
}
