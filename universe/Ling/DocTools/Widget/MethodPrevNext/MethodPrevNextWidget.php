<?php


namespace Ling\DocTools\Widget\MethodPrevNext;


use Ling\DocTools\Exception\BadWidgetConfigurationException;
use Ling\DocTools\Info\ClassInfo;
use Ling\DocTools\Info\MethodInfo;
use Ling\DocTools\Report\ReportInterface;
use Ling\DocTools\Widget\Widget;

/**
 * The MethodPrevNextWidget class.
 *
 */
class MethodPrevNextWidget extends Widget
{

    /**
     * This property holds the class info.
     *
     * @var ClassInfo
     */
    protected $classInfo;


    /**
     * This property holds the method info.
     *
     * @var MethodInfo
     */
    protected $methodInfo;


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
        $this->methodInfo = null;
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
     * Sets the methodInfo.
     *
     * @param MethodInfo $methodInfo
     */
    public function setMethodInfo(MethodInfo $methodInfo)
    {
        $this->methodInfo = $methodInfo;
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

        if (null === $this->methodInfo) {
            throw new BadWidgetConfigurationException("methodInfo not set. Use the setMethodInfo method.");
        }

        if (null === $this->classInfo) {
            throw new BadWidgetConfigurationException("classInfo not set. Use the setClassInfo method.");
        }

        if (null === $this->generatedItems2Url) {
            throw new BadWidgetConfigurationException("generatedItems2Url not set. Use the setGeneratedItemsToUrl method.");
        }

        $currentName = $this->methodInfo->getName();
        $className = $this->classInfo->getName();


        $methodItems = [];
        $methods = $this->classInfo->getMethods();
        $infoArray = [
            "previousItem" => null,
            "nextItem" => null,
        ];
        $previousItem = null;
        $currentPreviousItem = null;
        $waitingForNext = false;

        foreach ($methods as $methodInfo) {
            $name = $methodInfo->getName();
            $longName = $className . "::" . $name;
            if (array_key_exists($longName, $this->generatedItems2Url)) {
                $url = $this->generatedItems2Url[$longName];
                $item = [
                    $name,
                    $url,
                ];
                $methodItems[] = $item;


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
            $s .= "Previous method: [" . $infoArray['previousItem'][0] . "](" . $infoArray['previousItem'][1] . ")<br>";
        }
        if (null !== $infoArray['nextItem']) {
            $s .= "Next method: [" . $infoArray['nextItem'][0] . "](" . $infoArray['nextItem'][1] . ")<br>";
        }
        return $s;

    }


}
