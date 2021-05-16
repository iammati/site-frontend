<?php

declare(strict_types=1);

namespace Site\Frontend\ViewHelpers\Format;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Exception;

class DateViewHelper extends AbstractViewHelper
{
    /**
     * Initialize arguments.
     */
    public function initializeArguments()
    {
        $this->registerArgument('date', 'DateTime', 'A DateTime value.', true);
    }

    /**
     * @return string
     *
     * @throws Exception
     */
    public function render()
    {
        $date = $this->arguments['date'];

        if (is_string($date)) {
            $date = trim($date);
        }

        $day = $date->format('d');
        $monthAsNumb = $date->format('m');
        $month = ll(env('FRONTEND_EXT'), 'Date.MonthNames:'.$monthAsNumb);
        $year = $date->format('Y');

        $date = $day.'. '.$month.' '.$year;

        return $date;
    }
}
