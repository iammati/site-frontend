<?php

declare(strict_types=1);

namespace Site\Frontend\DataProcessing;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentDataProcessor;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

class TeaserTilesProcessor implements DataProcessorInterface
{
    /**
     * @var ContentDataProcessor
     */
    protected $contentDataProcessor;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->contentDataProcessor = GeneralUtility::makeInstance(ContentDataProcessor::class);
    }

    /**
     * Fetches records from the database as an array.
     *
     * @param ContentObjectRenderer $cObj                       The data of the content element or page
     * @param array                 $contentObjectConfiguration The configuration of Content Object
     * @param array                 $processorConfiguration     The configuration of this processor
     * @param array                 $processedData              Key/value store of processed data (e.g. to be passed to a Fluid View)
     *
     * @return array the processed data as key/value store
     */
    public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData)
    {
        $teaserTiles = $processedData['teasertiles'];
        $newTeaserTiles = [];

        // Wrapping first every 2 teasertiles into a separated array
        $i = 0;

        foreach ($teaserTiles as $n => $item) {
            if ($n % 2 == 0) {
                ++$i;
            }

            $newTeaserTiles[$i][] = $item;
        }

        $teaserTiles = [];

        // Then iterating through it and add again the same logic as above (every 2)
        // it sets 'image-text' or 'text-image' as position
        foreach ($newTeaserTiles as $m => $rowTeaserTiles) {
            $position = 'image-text';

            if ($m % 2 == 0) {
                $position = 'text-image';
            }

            foreach ($rowTeaserTiles as $key => $teaserTile) {
                $teaserTile['data']['position'] = $position;
                $teaserTiles[] = $teaserTile;
            }
        }

        $processedData['teasertiles'] = $teaserTiles;

        return $processedData;
    }
}
