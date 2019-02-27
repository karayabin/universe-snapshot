<?php


namespace DocTools\Widget\ClassPrevNext;


use DocTools\Exception\BadWidgetConfigurationException;
use DocTools\Info\ClassInfo;
use DocTools\Info\PlanetInfo;
use DocTools\Report\ReportInterface;
use DocTools\Widget\Widget;

/**
 * The ClassPrevNextWidget class.
 *
 */
class ClassPrevNextWidget extends Widget
{

    /**
     * This property holds the class info.
     *
     * @var ClassInfo
     */
    protected $classInfo;


    /**
     * This property holds the planet info.
     *
     * @var PlanetInfo
     */
    protected $planetInfo;


    /**
     * This property holds the array of className and/or className::methodName => url.
     * @var array
     */
    protected $generatedItems2Url;


    /**
     * This property holds the DocTools\Report\ReportInterface.
     *
     * @var ReportInterface
     */
    protected $report;

    /**
     * Builds the ClassMethodsWidget instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->classInfo = null;
        $this->planetInfo = null;
        $this->report = null;
        $this->generatedItems2Url = [];
    }

    /**
     * Sets the classInfo.
     *
     * @param ClassInfo $classInfo
     */
    public function setClassInfo(ClassInfo $classInfo)
    {
        $this->classInfo = $classInfo;
    }


    /**
     * Sets the planetInfo.
     *
     * @param PlanetInfo $planetInfo
     */
    public function setPlanetInfo(PlanetInfo $planetInfo)
    {
        $this->planetInfo = $planetInfo;
    }


    /**
     * Sets the generatedItems2Url.
     *
     * @param array $generatedItems2Url
     */
    public function setGeneratedItemsToUrl(array $generatedItems2Url)
    {
        $this->generatedItems2Url = $generatedItems2Url;
    }

    /**
     * Sets the report.
     *
     * @param ReportInterface $report
     */
    public function setReport(ReportInterface $report)
    {
        $this->report = $report;
    }


    /**
     * @implementation
     */
    public function render()
    {


        if (null === $this->planetInfo) {
            throw new BadWidgetConfigurationException("planetInfo not set. Use the setPlanetInfo method.");
        }


        if (null === $this->classInfo) {
            throw new BadWidgetConfigurationException("classInfo not set. Use the setClassInfo method.");
        }

        if (null === $this->generatedItems2Url) {
            throw new BadWidgetConfigurationException("generatedItems2Url not set. Use the setGeneratedItemsToUrl method.");
        }

        $currentName = $this->classInfo->getName();


        $classItems = [];
        $classes = $this->planetInfo->getClasses();
        $infoArray = [
            "previousItem" => null,
            "nextItem" => null,
        ];
        $previousItem = null;
        $currentPreviousItem = null;
        $waitingForNext = false;

        foreach ($classes as $_classInfo) {
            $name = $_classInfo->getName();
            if (array_key_exists($name, $this->generatedItems2Url)) {
                $url = $this->generatedItems2Url[$name];
                $item = [
                    $_classInfo->getShortName(),
                    $name,
                    $url,
                ];
                $classItems[] = $item;


                if (true === $waitingForNext) {
                    $infoArray['nextItem'] = $item;
                    break;
                }

                if ($currentName === $name) {
                    if (null !== $previousItem) {
                        $infoArray['previousItem'] = $previousItem;
                    }
                    $waitingForNext = true;
                }
                $previousItem = $item;
            }
        }


        $s = '';
        if (null !== $infoArray['previousItem']) {
            $s .= "Previous class: [" . $infoArray['previousItem'][0] . "](" . $infoArray['previousItem'][2] . ")<br>";
        }
        if (null !== $infoArray['nextItem']) {
            $s .= "Next class: [" . $infoArray['nextItem'][0] . "](" . $infoArray['nextItem'][2] . ")<br>";
        }
        return $s;

    }


}
