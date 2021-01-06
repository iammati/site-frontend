<?php

declare(strict_types=1);

namespace Site\Frontend\ViewHelpers;

use Site\Core\Utility\ExceptionUtility;
use Site\Core\Utility\StrUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * This ViewHelper can be used inside Container-Templates
 * to handle the gridClasses-variable - which gets built inside this VH.
 *
 * Additional logic can be added here for any type of container.
 * Optionally make use of the DataProcessors (TypoScript definition).
 */
class ContainerViewHelper extends AbstractViewHelper
{
    /**
     * Initialization of required arguments for this ViewHelper.
     *
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('data', 'array', 'The default data-array a view receives.', true);
    }

    /**
     * The actual render logic whenever this VH gets called.
     * Handles the given arguments, generates and adds at the end.
     *
     * @return void
     */
    public function render()
    {
        $data = $this->arguments['data'];

        if ($data === null) {
            ExceptionUtility::throw('Couldn\'t generate gridClasses-variable for this view. Data has been passed as null.');
        }

        $gridClasses = [];
        $additionalHtml = '';
        $gridSelector = '[data-ctype="container"][data-uid="'.$data['uid'].'"]';

        // Container-Fluid
        if ($data['containerIsFluid']) {
            $gridClasses[] = '-fluid';
        }

        // Spaces - for now only paddings.
        // Margin spaces should use the frame-layout spaces provided by TYPO3 instead.
        $spaceBefore = $this->getSpaceByIdentifier($data['containerSpaceBefore']);
        $spaceAfter = $this->getSpaceByIdentifier($data['containerSpaceAfter']);

        if ($data['containerSpaceBefore'] != '') {
            $gridClasses[] = 'pt-'.$spaceBefore;
        }

        if ($data['containerSpaceAfter'] != '') {
            $gridClasses[] = 'pb-'.$spaceAfter;
        }

        $gridClasses = implode(' ', $gridClasses);

        if ($gridClasses == ' ') {
            $gridClasses = '';
        }

        if ($gridClasses != '' && !StrUtility::contains($gridClasses, '-fluid')) {
            $gridClasses = ' '.$gridClasses;
        }

        $this->templateVariableContainer->add('gridClasses', $gridClasses);

        if ($additionalHtml != '') {
            $this->templateVariableContainer->add('additionalHtml', $additionalHtml);
        }
    }

    /**
     * Returns the actual space as int which SHOULD BE used rem-unit in CSS.
     *
     * @param string $spaceIdentifier The identifier of the space. E.g. 'small' or 'extra-large'.
     *
     * @return int|null
     */
    private function getSpaceByIdentifier(string $spaceIdentifier = '')
    {
        $space = null;

        if ($spaceIdentifier == '') {
            return $space;
        }

        switch ($spaceIdentifier) {
            case 'extra-small':
                $space = 2;
                break;

            case 'small':
                $space = 4;
                break;

            case 'medium':
                $space = 6;
                break;

            case 'large':
                $space = 8;
                break;

            case 'extra-large':
                $space = 10;
                break;

            default:
                $space = 0;
                break;
        }

        return $space;
    }
}
