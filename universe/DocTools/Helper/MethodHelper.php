<?php


namespace DocTools\Helper;


use Bat\DebugTool;
use DocTools\Info\MethodInfo;
use DocTools\Report\ReportInterface;


/**
 * The MethodHelper class.
 * A generic helper class to help with method related problems.
 *
 */
class MethodHelper
{


    /**
     * Returns the method's return type, with links to class names when possible.
     *
     * @param MethodInfo $method
     * @param array $generatedItems2Url
     * @param ReportInterface|null $report
     * @return string
     */
    public static function getMethodReturnType(
        MethodInfo $method,
        array $generatedItems2Url,
        ReportInterface $report = null
    )
    {


        $s = "";
        $types = explode('|', $method->getReturnType());

        foreach ($types as $k => $type) {
            // if it's a user class, we try to make it a link
            if (false === in_array($type, CommentHelper::$propertyReturnTagTypes, true)) {


                if ('$this' === $type) {
                    $type = $method->getDeclaringClass();
                }


                $epuratedType = rtrim($type, '[]'); // to parse MethodInfo[] as MethodInfo for instance.


                if (array_key_exists($epuratedType, $generatedItems2Url)) {
                    $q = explode("\\", $type);
                    $shortType = array_pop($q);
                    $types[$k] = '[' . $shortType . '](' . $generatedItems2Url[$epuratedType] . ')';
                }
                else {
                    if (null !== $report) {
                        $report->addUnresolvedClassReference($type, "method " . $method->getName() . " (hint provided by DocTools\Helper\MethodHelper)");
                    }
                }
            }
        }

        $s .= implode(' | ', $types);
        return $s;
    }


    /**
     * Returns a method signature with links to class names when possible.
     *
     *
     *
     * @param MethodInfo $method
     * @param array $generatedItems2Url
     * @param array $options
     * @param ReportInterface|null $report
     * @return string
     * @throws \ReflectionException
     */
    public static function getMethodSignature(
        MethodInfo $method,
        array $generatedItems2Url,
        array $options = [],
        ReportInterface $report = null
    )
    {

        $s = "";
        $showDeclaringClass = $options['showDeclaringClass'] ?? true;


        $reflectionMethod = $method->getReflectionMethod();
        $className = $reflectionMethod->getDeclaringClass()->getName();
        $methodName = $method->getName();
        $methodLongName = $className . "::" . $methodName;


        if (true === $reflectionMethod->isFinal()) {
            $s .= 'final ';
        }
        if (true === $reflectionMethod->isAbstract()) {
            $s .= 'abstract ';
        }
        $visibility = $method->getVisibility();
        $s .= "$visibility ";

        if (true === $reflectionMethod->isStatic()) {
            $s .= 'static ';
        }


        if (array_key_exists($methodLongName, $generatedItems2Url)) {
            $methodUrl = $generatedItems2Url[$methodLongName];
            $s .= '[';
            if (true === $showDeclaringClass) {
                $s .= $reflectionMethod->getDeclaringClass()->getShortName() . '::';
            }
            $s .= $method->getName() . '](' . $methodUrl . ')';
        }
        else {
            if (null !== $report) {
                $report->addUnresolvedMethodReference($className, $methodName, "MethodHelper::getMethodSignature");
            }

            if (true === $showDeclaringClass) {
                $s .= $reflectionMethod->getDeclaringClass()->getShortName() . '::';
            }
            $s .= $method->getName();
        }


        //--------------------------------------------
        // PARAMS
        //--------------------------------------------
        $s .= '(';
        $i = 0;
        foreach ($reflectionMethod->getParameters() as $parameter) {
            if ($i++ > 0) {
                $s .= ', ';
            }


            if ($parameter->allowsNull() && false === $parameter->isOptional()) {
                $s .= '?';
            }


            if ($parameter->isArray()) {
                $s .= 'array ';
            }
            elseif ($parameter->isCallable()) {
                $s .= 'callable ';
            }
            else {
                $hint = $parameter->getClass();

                if (null !== $hint) {

                    $propertyClassName = $hint->name;

                    if (false === $hint->isUserDefined()) {
                        $propertyClassName = '\\' . $propertyClassName;
                    }

                    if (array_key_exists($propertyClassName, $generatedItems2Url)) {
                        $propertyClassName = '[' . $propertyClassName . '](' . $generatedItems2Url[$propertyClassName] . ')';
                    }
                    else {
                        if (null !== $report) {
                            $report->addUnresolvedClassReference($propertyClassName, "method " . $method->getName() . ", param " . $parameter->getName());
                        }
                    }
                    $s .= $propertyClassName . " ";
                }
                else {
                    $paramType = $parameter->getType();
                    if (null !== $paramType) {
                        $s .= $paramType . ' ';
                    }
                }
            }

            if (true === $parameter->isPassedByReference()) {
                $s .= '&';
            }

            if (true === $parameter->isVariadic()) {
                $s .= '...';
            }

            $s .= '$' . $parameter->getName();

            if ($parameter->isOptional()) {
                $defaultValue = $parameter->getDefaultValue();
                if (is_array($defaultValue)) {
                    $defaultValue = DebugTool::toString($defaultValue);
                }
                elseif (null === $defaultValue) {
                    $defaultValue = "null";
                }
                elseif (false === $defaultValue) {
                    $defaultValue = "false";
                }
                elseif (true === $defaultValue) {
                    $defaultValue = "true";
                }


                $s .= ' = ' . htmlspecialchars($defaultValue);
            }

        }
        $s .= ')';
        $s .= ' : ';


        //--------------------------------------------
        // RETURN TYPES
        //--------------------------------------------
        $s .= self::getMethodReturnType($method, $generatedItems2Url, $report);

        $s .= PHP_EOL;
        return $s;
    }

}