<?php


namespace Ling\DocTools\Widget\ClassMethods;


use Ling\DocTools\Exception\BadWidgetConfigurationException;
use Ling\DocTools\Info\ClassInfo;
use Ling\DocTools\Report\ReportInterface;
use Ling\DocTools\Widget\Widget;

/**
 * The ClassMethodsWidget class.
 * It helps to reproduce the following widget:
 *
 * ![screenshot from php.net](http://lingtalfi.com/img/universe/DocTools/class-methods-widget.png)
 *
 *
 *
 */
class ClassMethodsWidget extends Widget
{

    /**
     * This property holds the class info.
     *
     * @var ClassInfo
     */
    protected $classInfo;


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


        if (null === $this->classInfo) {
            throw new BadWidgetConfigurationException("classInfo not set. Use the setClassInfo method.");
        }

        if (null === $this->generatedItems2Url) {
            throw new BadWidgetConfigurationException("generatedItems2Url not set. Use the setGeneratedItemsToUrl method.");
        }


        $s = '';
        $methods = $this->classInfo->getMethods();
        $className = $this->classInfo->getName();


        foreach ($methods as $method) {


            $methodFullName = $method->getReflectionMethod()->getDeclaringClass()->getName() . "::" . $method->getName();
            $methodString = $method->getReflectionMethod()->getDeclaringClass()->getShortName() . "::" . $method->getName();

            if (array_key_exists($methodFullName, $this->generatedItems2Url)) {
                $methodString = '[' . $methodString . '](' . $this->generatedItems2Url[$methodFullName] . ')';
            }
            else {
                if (null !== $this->report) {
                    $p = explode("::", $methodFullName);
                    $_class = $p[0];
                    $_method = $p[1];
                    $this->report->addUnresolvedMethodReference($_class, $_method, "ClassMethodsWidget");
                }
            }

            $s .= '- ' . $methodString;
            $s .= ' &ndash; ' . $method->getComment()->getFirstSentence() . PHP_EOL;
        }

        return $s;

    }


}
