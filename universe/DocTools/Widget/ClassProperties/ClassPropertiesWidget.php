<?php


namespace DocTools\Widget\ClassProperties;


use Bat\StringTool;
use DocTools\Exception\BadWidgetConfigurationException;
use DocTools\Info\ClassInfo;
use DocTools\Widget\Widget;

/**
 * The ClassPropertiesWidget class.
 * It helps to reproduce the following widget:
 *
 * ![screenshot from php.net](http://lingtalfi.com/img/universe/DocTools/class-properties-widget.png)
 *
 *
 *
 */
class ClassPropertiesWidget extends Widget
{

    /**
     * This property holds the class info.
     *
     * @var ClassInfo
     */
    protected $classInfo;


    /**
     * Builds the ClassPropertiesWidget instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->classInfo = null;
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
     * @implementation
     */
    public function render()
    {

        if (null === $this->classInfo) {
            throw new BadWidgetConfigurationException("classInfo not set. Use the setClassInfo method.");
        }


        $s = '';
        $properties = $this->classInfo->getProperties();
        foreach ($properties as $property) {

            $s .= '- <span id="property-'. $property->getName() .'"><b>' . $property->getName()  . '</b></span>' . PHP_EOL;
            $s .= PHP_EOL;
            $s .= StringTool::indent($property->getComment()->getMainText(), 4) . PHP_EOL;
            $s .= PHP_EOL;
        }

        return $s;
    }
}