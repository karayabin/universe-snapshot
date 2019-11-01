<?php


namespace Ling\Light_Kit\PageConfigurationUpdator;


use Ling\Bat\ArrayTool;
use Ling\Bat\BDotTool;

/**
 * The PageConfUpdator class.
 */
class PageConfUpdator
{

    /**
     * This property holds the mergeArray for this instance.
     * It's an array to merge with the page configuration array.
     *
     *
     * @var array
     */
    protected $mergeArray;

    /**
     * This property holds the identifierLayers for this instance.
     *
     *
     * @var array
     */
    protected $identifierLayers;


    /**
     * Builds the PageConfUpdator instance.
     */
    public function __construct()
    {
        $this->mergeArray = [];
        $this->identifierLayers = [];
    }

    /**
     * Builds and returns a PageConfUpdator instance.
     * @return PageConfUpdator
     */
    public static function create(): PageConfUpdator
    {
        return new static();
    }


    /**
     * Updates the given $pageConf array.
     *
     * @param array $pageConf
     */
    public function update(array &$pageConf)
    {
        if ($this->mergeArray) {
            $pageConf = array_replace_recursive($pageConf, $this->mergeArray);
        }
        if ($this->identifierLayers) {
            foreach ($this->identifierLayers as $item) {
                list($widgetIdentifier, $newWidgetConfLayer) = $item;
                $p = explode('.', $widgetIdentifier, 2);
                $zone = $p[0];
                $identifier = $p[1];
                $zoneConf = BDotTool::getDotValue("zones." . $zone, $pageConf, null);
                if (null !== $zoneConf) {
                    foreach ($zoneConf as $index => $widgetConf) {
                        if (
                            $identifier === $widgetConf['name'] ||
                            (array_key_exists("identifier", $widgetConf) && $identifier === $widgetConf['identifier'])
                        ) {
                            $pageConf["zones"][$zone][$index] = ArrayTool::arrayMergeReplaceRecursive([$widgetConf, $newWidgetConfLayer]);
                        }
                    }
                }
            }
        }
    }

    /**
     * Sets the mergeArray.
     *
     * @param array $mergeArray
     * @return $this
     */
    public function setMergeArray(array $mergeArray): PageConfUpdator
    {
        $this->mergeArray = $mergeArray;
        return $this;
    }


    /**
     * Updates widget identified by $widgetIdentifier using the $newWidgetConfLayer layer.
     * The widgetIdentifier is a string with the following format:
     *
     * - $zone.$identifier
     *
     * With:
     *
     * - $zone: the name of the zone containing the widget
     * - $identifier: the "identifier" key of the widget to update (this should be set by the plugin author).
     *      See more details in my @page(conception notes about the page updator).
     *
     *
     *
     *
     *
     * The layer will be merged with the page configuration array using the ams algorithm,
     * which allows use to replace items from an associative array and add items to numerically indexed arrays.
     * For more details refer to the @page(ams algorithm documentation).
     *
     *
     * @param string $widgetIdentifier
     * @param array $newWidgetConfLayer
     * @return $this
     */
    public function updateWidget(string $widgetIdentifier, array $newWidgetConfLayer): PageConfUpdator
    {
        $this->identifierLayers[] = [$widgetIdentifier, $newWidgetConfLayer];
        return $this;
    }

}