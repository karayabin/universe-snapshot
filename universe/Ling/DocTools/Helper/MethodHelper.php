<?php


namespace Ling\DocTools\Helper;


use Ling\Bat\DebugTool;
use Ling\DocTools\Exception\DocToolsException;
use Ling\DocTools\Info\MethodInfo;
use Ling\DocTools\Report\ReportInterface;
use ReflectionNamedType;
use ReflectionParameter;
use ReflectionType;
use ReflectionUnionType;


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


                if (
                    array_key_exists($epuratedType, $generatedItems2Url) ||
                    array_key_exists($type, $generatedItems2Url)
                ) {

                    if (array_key_exists($epuratedType, $generatedItems2Url)) {
                        $url = $generatedItems2Url[$epuratedType];
                    } else {
                        $url = $generatedItems2Url[$type];
                    }

                    $q = explode("\\", $epuratedType);
                    $shortType = array_pop($q);
                    $types[$k] = '[' . $shortType . '](' . $url . ')';
                } else {
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
        } else {
            if (null !== $report) {
                $report->addUnresolvedMethodReference($className, $methodLongName, "MethodHelper::getMethodSignature");
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


            if (true === $parameter->isOptional() && false === $parameter->isVariadic()) {
                $s .= '?';
            }


            $type = $parameter->getType();
            if (null !== $type) {


                $s .= self::resolveType($type, $generatedItems2Url, $method, $parameter, $report);
                $s .= ' ';
            }


            if (true === $parameter->isPassedByReference()) {
                $s .= '&';
            }

            if (true === $parameter->isVariadic()) {
                $s .= '...';
            }


            $s .= '$' . $parameter->getName();

            if ($parameter->isOptional() && false === $parameter->isVariadic()) {
                $defaultValue = $parameter->getDefaultValue();
                if (is_array($defaultValue)) {
                    $defaultValue = DebugTool::toString($defaultValue);
                } elseif (null === $defaultValue) {
                    $defaultValue = "null";
                } elseif (false === $defaultValue) {
                    $defaultValue = "false";
                } elseif (true === $defaultValue) {
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


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the type documentation part for the given type.
     * @param ReflectionType $type
     * @param array $generatedItems2Url
     * @param MethodInfo $method
     * @param ReflectionParameter $parameter
     * @param ReportInterface|null $report
     * @return string
     * @throws \Exception
     *
     */
    private static function resolveType(ReflectionType $type, array $generatedItems2Url, MethodInfo $method, ReflectionParameter $parameter, ReportInterface $report = null): string
    {
        $s = '';
        if ($type instanceof ReflectionUnionType) {
            $types = $type->getTypes();
            $c = 0;
            foreach ($types as $namedType) {
                if (0 !== $c) {
                    $s .= '|';
                }
                $s .= self::resolveType($namedType, $generatedItems2Url, $method, $parameter, $report);
                $c++;
            }
        } elseif ($type instanceof ReflectionNamedType) {
            $namedType = $type->getName();

            if (str_contains($namedType, '\\')) {
                if (array_key_exists($namedType, $generatedItems2Url)) {
                    $namedType = '[' . $namedType . '](' . $generatedItems2Url[$namedType] . ')';
                } else {
                    if (null !== $report) {
                        $report->addUnresolvedClassReference($namedType, "method " . $method->getName() . ", param " . $parameter->getName());
                    }
                }
            }

            $s .= $namedType;
        } else {
            throw new DocToolsException("This code needs more love...");
        }

        return $s;
    }

}