<?php


namespace Ling\DocTools\Widget\ClassSynopsis;


use Ling\Bat\DebugTool;
use Ling\DocTools\Exception\BadWidgetConfigurationException;
use Ling\DocTools\Helper\CommentHelper;
use Ling\DocTools\Helper\MethodHelper;
use Ling\DocTools\Info\ClassInfo;
use Ling\DocTools\Info\MethodInfo;
use Ling\DocTools\Info\PropertyInfo;
use Ling\DocTools\Report\ReportInterface;
use Ling\DocTools\Widget\Widget;

/**
 * The ClassSynopsisWidget class.
 * It tries to reproduce the following widget:
 *
 * ![screenshot from php.net](http://lingtalfi.com/img/universe/DocTools/class-synopsis-widget.png)
 *
 *
 * Options
 * ----------
 * - bodyStyle: string = indented (indented|flat).
 *      The style of the body. Possible values are:
 *          - flat: the section title and its elements are at the same indentation level (root)
 *          - indented: (default) the section title is a list at level 0, and the elements are children of that list (level 1)
 *
 *
 *
 */
class ClassSynopsisWidget extends Widget
{

    /**
     * This property holds the class info.
     *
     * @var ClassInfo
     */
    protected $classInfo;


    /**
     * This property holds a map of className and/or className::methodName => url.
     *
     * @var array
     */
    protected $generatedItems2Url;

    /**
     * This property holds a report instance.
     * If not set, this class will not report anything.
     *
     * @var ReportInterface
     */
    protected $report;


    /**
     * This property holds the style to apply to the widget.
     * The following values are available:
     * - flat: the section titles (properties, methods) are written with doc comments, and the actual elements (properties, methods)
     *      are written as top level elements of a list
     *
     * - indented: the section titles are written as top level elements of a list, and the actual elements are their children (nested list elements).
     *      This is the default value
     *
     *
     * @var string = indented (indented|flat)
     */
    protected $_bodyStyle;


    /**
     * Builds the ClassSynopsisWidget instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->classInfo = null;
        $this->generatedItems2Url = [];
        $this->report = null;
        $this->_bodyStyle = "indented";
    }

    /**
     * Sets the generatedItems2Url.
     * @param array $generatedItems2Url
     */
    public function setGeneratedItems2Url(array $generatedItems2Url)
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

        $class = $this->classInfo->getReflectionClass();

        $this->_bodyStyle = $this->options['bodyStyle'] ?? "indented";


        if (null !== $this->report) {
            $this->report->setCurrentContext($class->getName());
        }

        //--------------------------------------------
        // SIGNATURE
        //--------------------------------------------

        $s = '';
        if (true === $class->isFinal()) {
            $s .= 'final ';
        }

        if (true === $class->isAbstract()) {
            $s .= 'abstract ';
        }

        $classType = "class";
        if ($class->isTrait()) {
            $classType = "trait";
        }


        $s .= $classType . ' ';
        $className = $class->getShortName();
        if (false === $class->isUserDefined()) {
            $className = '\\' . $className;
        }
        $s .= '<span class="pl-k">' . $className . '</span> ';


        $originalClassName = $className;
        $parent = $class->getParentClass();
        if (false !== $parent) {

            $classUrl = $this->getClassUrl($parent, 'extends');
            $className = $parent->getShortName();
            if (false === $parent->isUserDefined()) {
                $className = '\\' . $className;
            }

            if (false !== $classUrl) {
                $s .= 'extends [' . $className . '](' . $classUrl . ') ';
            } else {
                $s .= 'extends ' . $className . ' ';
            }

        }

        $interfaces = $class->getInterfaces();
        if ($interfaces) {

            $s .= 'implements ';
            $c = 0;
            foreach ($interfaces as $interface) {
                if (0 !== $c++) {
                    $s .= ', ';
                }


                $classUrl = $this->getClassUrl($interface, $originalClassName . ' implements');
                $className = $interface->getShortName();
                if (false === $interface->isUserDefined()) {
                    $className = '\\' . $className;
                }

                if (false !== $classUrl) {
                    $s .= '[' . $className . '](' . $classUrl . ')';
                } else {
                    $s .= $className;
                }
            }
        }

        $visibilityFilter = null;


        $s .= ' {' . PHP_EOL;
        $s .= PHP_EOL;


        //--------------------------------------------
        // CONSTANTS
        //--------------------------------------------
        $constants = $class->getReflectionConstants();
        if (count($constants) > 0) {

            $instanceConstants = [];
            $inheritedConstants = [];
            foreach ($constants as $constant) {
                if ($constant->getDeclaringClass()->getShortName() === $class->getShortName()) {
                    $instanceConstants[] = $constant;
                } else {
                    $inheritedConstants[] = $constant;
                }
            }

            if (count($instanceConstants) > 0) {
                $s .= $this->getSectionTitle("Constants") . PHP_EOL;
                foreach ($instanceConstants as $constant) {
                    $this->addConstantLine($s, $constant);
                }
                $s .= PHP_EOL;
            }

            if (count($inheritedConstants) > 0) {
                $s .= $this->getSectionTitle("Inherited constants") . PHP_EOL;
                foreach ($inheritedConstants as $constant) {
                    $this->addConstantLine($s, $constant, true);
                }
                $s .= PHP_EOL;
            }
        }


        //--------------------------------------------
        // PROPERTIES
        //--------------------------------------------
        $properties = $this->classInfo->getProperties();

        if (count($properties) > 0) {

            $instanceProperties = [];
            $inheritedProperties = [];
            foreach ($properties as $property) {

                if ($property->getDeclaringClass() === $class->getName()) {
                    $instanceProperties[] = $property;
                } else {
                    $inheritedProperties[] = $property;
                }
            }
            if (count($instanceProperties) > 0) {
                $s .= $this->getSectionTitle("Properties") . PHP_EOL;
                foreach ($instanceProperties as $property) {
                    $this->addPropertyLine($s, $property);
                }
                $s .= PHP_EOL;
            }

            if (count($inheritedProperties) > 0) {
                $s .= $this->getSectionTitle("Inherited properties") . PHP_EOL;
                foreach ($inheritedProperties as $property) {
                    $this->addPropertyLine($s, $property, true);
                }
                $s .= PHP_EOL;
            }
        }


        //--------------------------------------------
        // METHODS
        //--------------------------------------------
        $methods = $this->classInfo->getMethods();

        if (count($methods) > 0) {

            $instanceMethods = [];
            $inheritedMethods = [];
            foreach ($methods as $method) {


                if ($method->getDeclaringClass() === $class->getName()) {
                    $instanceMethods[] = $method;
                } else {
                    $inheritedMethods[] = $method;
                }
            }
            if (count($instanceMethods) > 0) {
                $s .= $this->getSectionTitle("Methods") . PHP_EOL;
                foreach ($instanceMethods as $method) {
                    $this->addMethodLine($s, $method);
                }
                $s .= PHP_EOL;
            }

            if (count($inheritedMethods) > 0) {
                $s .= $this->getSectionTitle("Inherited methods") . PHP_EOL;
                foreach ($inheritedMethods as $method) {
                    $this->addMethodLine($s, $method, true);
                }
                $s .= PHP_EOL;
            }
        }


        $s .= '}' . PHP_EOL;
        return $s;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the class url for the given $class.
     *
     *
     * @param \ReflectionClass $class
     * @param null $hint
     * @return false|string. False in case of failure.
     */
    protected function getClassUrl(\ReflectionClass $class, $hint = null)
    {
        $className = $class->getName();
        if (false === $class->isUserDefined()) {
            $className = "\\" . $className;
        }


        if (array_key_exists($className, $this->generatedItems2Url)) {
            return $this->generatedItems2Url[$className];
        }

        if (null !== $this->report) {
            $this->report->setCurrentContext(get_called_class());
            $this->report->addUnresolvedClassReference($className, $hint);
        }

        return false;
    }


    /**
     * Adds the constant line to the given $s string.
     *
     * @param string $s
     * @param \ReflectionClassConstant $constant
     * @param bool $showDeclaringClass
     * @throws BadWidgetConfigurationException
     */
    protected function addConstantLine(string &$s, \ReflectionClassConstant $constant, bool $showDeclaringClass = false)
    {
        $visibility = $this->getConstantVisibility($constant);
        $indent = $this->getElementIndentedDash();
        $s .= "$indent $visibility const ";

        $s .= '[';
        if (true === $showDeclaringClass) {
            $s .= $constant->getDeclaringClass()->getShortName() . '::';
        }

        $s .= $constant->getName() . '](#constant-' . $constant->getName() . ')';
        $s .= " = " . $constant->getValue() . ' ;';
        $s .= PHP_EOL;
    }


    /**
     * Adds the property line to the given $s string.
     *
     * @param string $s
     * @param PropertyInfo $property
     * @param bool $showDeclaringClass
     * @throws BadWidgetConfigurationException
     */
    protected function addPropertyLine(string &$s, PropertyInfo $property, bool $showDeclaringClass = false)
    {
        $visibility = $property->getVisibility();
        $indent = $this->getElementIndentedDash();
        $s .= "$indent $visibility";
        if (true === $property->getReflectionProperty()->isStatic()) {
            $s .= ' static';
        }

        $types = explode('|', $property->getType());

        foreach ($types as $k => $type) {
            // if it's a user class, we try to make it a link

            if (false === in_array($type, CommentHelper::$propertyVarTagTypes, true)) {

                $epuratedType = rtrim($type, '[]');

                if (array_key_exists($epuratedType, $this->generatedItems2Url)) {
                    $types[$k] = '[' . $type . '](' . $this->generatedItems2Url[$epuratedType] . ')';
                } else {
                    if (null !== $this->report) {
                        /**
                         * We only report problems if the property class is user defined.
                         */
                        if ($property->getReflectionProperty()->getDeclaringClass()->isUserDefined()) {
                            $this->report->addUnresolvedClassReference($type, "property: " . $property->getName() . " (hint provided by DocTools\Widget\ClassSynopsis\ClassSynopsisWidget)");
                        }
                    }
                }
            }
        }

        $s .= " " . implode('|', $types);


        $s .= ' [';
        if (true === $showDeclaringClass) {
            $s .= $property->getReflectionProperty()->getDeclaringClass()->getShortName() . '::';
        }

        $s .= '$' . $property->getName() . '](#property-' . $property->getName() . ')';

        $defaultValue = $property->getDefaultValue();
        if (null !== $defaultValue) {
            if (true === $defaultValue || false === $defaultValue) {
                $defaultValue = (true === $defaultValue) ? "true" : "false";
            }
            $defaultValue = DebugTool::toString($defaultValue);
            $s .= " = " . $defaultValue;
        }

        $s .= ' ;';
        $s .= PHP_EOL;
    }


    /**
     * Adds the method line to the given $s string.
     *
     * @param $s
     * @param MethodInfo $method
     * @param bool $showDeclaringClass
     * @throws BadWidgetConfigurationException
     * @throws \ReflectionException
     */
    protected function addMethodLine(&$s, MethodInfo $method, $showDeclaringClass = false)
    {
        $indent = $this->getElementIndentedDash();
        $s .= $indent . ' ';
        $s .= MethodHelper::getMethodSignature($method, $this->generatedItems2Url, [
            "showDeclaringClass" => $showDeclaringClass,
            $this->report
        ]);


    }


    /**
     * Returns the constant visibility.
     * One of public, protected or private.
     *
     *
     * @param \ReflectionClassConstant $constant
     * @return string
     */
    protected function getConstantVisibility(\ReflectionClassConstant $constant)
    {
        if ($constant->isPrivate()) {
            return "private";
        } elseif ($constant->isProtected()) {
            return "protected";
        }
        return "public";
    }


    /**
     * Returns the section title, depending on the body style.
     * The section title is the title of a list of elements (properties, inherited properties, methods, ...).
     *
     * @param $title
     * @return string
     * @throws BadWidgetConfigurationException
     */
    protected function getSectionTitle(string $title)
    {
        if ('indented' === $this->_bodyStyle) {
            return "- $title";
        } elseif ("flat" === $this->_bodyStyle) {
            return "/** $title */";
        }
        throw new BadWidgetConfigurationException("Unknown body style " . $this->_bodyStyle);
    }


    /**
     * Returns the properly indented dash for body elements (methods, properties, inherited properties, ...).
     *
     * @return string
     * @throws BadWidgetConfigurationException
     */
    protected function getElementIndentedDash()
    {
        if ('indented' === $this->_bodyStyle) {
            return "    -";
        } elseif ("flat" === $this->_bodyStyle) {
            return "-";
        }
        throw new BadWidgetConfigurationException("Unknown body style " . $this->_bodyStyle);
    }


}