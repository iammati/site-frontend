<?php

declare(strict_types=1);

namespace Site\Frontend\Listener;

use Site\Frontend\Configuration\Event\CTypeRenderingEvent;

class CTypeRenderingListener
{
    public function __invoke(CTypeRenderingEvent $event)
    {
        $cObj = $event->getCObj();
        $data = $cObj->data;

        $CType = $data['CType'];

        // do some stuff here e.g.
        // manipulating the $data...

        $cObj->data = $data;

        return $cObj;
    }
}
