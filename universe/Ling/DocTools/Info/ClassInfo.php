<?php


namespace Ling\DocTools\Info;


/**
 * The ClassInfo class.
 */
class ClassInfo implements InfoInterface
{


    /**
     * This property holds a @kw(commentInfo) object.
     *
     * @var CommentInfo
     */
    protected $comment;

    /**
     * This property holds an array of @kw(PropertyInfo) objects.
     * @var PropertyInfo[]
     */
    protected $properties;

    /**
     * This property holds an array of @kw(MethodInfo) objects.
     * @var MethodInfo[]
     */
    protected $methods;


    /**
     * This property holds the name of the class.
     *
     * @var string
     */
    protected $name;


    /**
     * This property holds the shortName of the class.
     *
     * @var string
     */
    protected $shortName;

    /**
     * This property holds the signature of the class.
     * @var string
     */
    protected $signature;

    /**
     * This property holds an array of interfaces (class names) of the implemented interfaces.
     *
     * @var array
     */
    protected $interfaces;


    /**
     * This property holds the \ReflectionClass instance for this class.
     *
     * @var \ReflectionClass
     */
    protected $reflectionClass;


    /**
     * Builds the ClassInfo instance.
     */
    public function __construct()
    {
        $this->properties = [];
        $this->methods = [];
        $this->comment = null;
        $this->interfaces = [];
        $this->name = null;
        $this->shortName = null;
        $this->signature = null;
        $this->reflectionClass = null;
    }


    /**
     * Returns the comment, or null if the comment doesn't exist.
     *
     * @return CommentInfo|null
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Returns an array of @doc(PropertyInfo).
     *
     *
     * @param null|string $filter
     *      The property visibility(ies) to return (public, protected, private).
     *      Can be expressed either as an array (to combine multiple visibilities) or a string (single visibility).
     *
     * @return PropertyInfo[]
     */
    public function getProperties($filter = null)
    {
        if (null === $filter) {
            return $this->properties;
        }
        $ret = [];
        if (!is_array($filter)) {
            $filter = [$filter];
        }
        foreach ($this->properties as $propertyInfo) {
            if (in_array($propertyInfo->getVisibility(), $filter, true)) {
                $ret[] = $propertyInfo;
            }
        }
        return $ret;
    }


    /**
     *
     * Returns an array of @doc(MethodInfo).
     *
     *
     * @param string|array $filter
     *      The methods visibility(ies) to return (public, protected, private).
     *      Can be expressed either as an array (to combine multiple visibilities) or a string (single visibility).
     *
     * @return MethodInfo[]
     */
    public function getMethods($filter = null)
    {
        if (null === $filter) {
            return $this->methods;
        }

        $methods = [];
        if (!is_array($filter)) {
            $filter = [$filter];
        }

        foreach ($this->methods as $methodInfo) {
            if (in_array($methodInfo->getVisibility(), $filter, true)) {
                $methods[] = $methodInfo;
            }
        }

        return $methods;
    }


    /**
     * Returns the list of @doc(MethodInfo) declared by this class (i.e. not inherited).
     *
     *
     * @param string|array $filter
     *      The methods visibility(ies) to return (public, protected, private).
     *      Can be expressed either as an array (to combine multiple visibilities) or a string (single visibility).
     * @return MethodInfo[]
     */
    public function getOwnMethods($filter = null)
    {
        $ret = [];
        $allMethods = $this->getMethods($filter);
        foreach ($allMethods as $method) {
            if ($method->getDeclaringClass() === $this->getName()) {
                $ret[] = $method;
            }
        }
        return $ret;
    }


    /**
     * Sets the comment.
     *
     * @param CommentInfo $comment
     * @return $this
     */
    public function setComment(CommentInfo $comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * Adds a property.
     *
     * @param PropertyInfo $property
     * @return $this
     */
    public function addProperty(PropertyInfo $property)
    {
        $this->properties[] = $property;
        return $this;
    }

    /**
     * Adds a method to this classInfo instance.
     *
     * @param MethodInfo $method
     * @return $this
     */
    public function addMethod(MethodInfo $method)
    {
        $this->methods[] = $method;
        return $this;
    }

    /**
     * Returns the name of the class.
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Sets the name.
     *
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Returns the signature.
     *
     * @return null
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Sets the signature.
     *
     * @param $signature
     * @return $this
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
        return $this;
    }

    /**
     * Returns the class short name.
     * @return null
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Sets the class short name.
     *
     * @param $shortName
     * @return $this
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
        return $this;
    }

    /**
     * Returns the interface class names.
     * @return array
     */
    public function getInterfaces(): array
    {
        return $this->interfaces;
    }


    /**
     * Sets the interface class names.
     *
     * @param array $interfaces
     * @return $this
     */
    public function setInterfaces(array $interfaces)
    {
        $this->interfaces = $interfaces;
        return $this;
    }

    /**
     * Returns the reflectionClass of this instance.
     *
     * @return \ReflectionClass
     */
    public function getReflectionClass(): \ReflectionClass
    {
        return $this->reflectionClass;
    }

    /**
     * Sets the reflectionClass.
     *
     * @param \ReflectionClass $reflectionClass
     */
    public function setReflectionClass(\ReflectionClass $reflectionClass)
    {
        $this->reflectionClass = $reflectionClass;
    }


    /**
     * Returns whether the class has (direct) properties.
     *
     * @return bool
     */
    public function hasProperties()
    {
        $props = $this->getReflectionClass()->getProperties();
        foreach ($props as $prop) {
            if ($prop->getDeclaringClass()->getName() === $this->getName()) {
                return true;
            }
        }
        return false;
    }


}