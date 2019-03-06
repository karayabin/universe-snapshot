<?php


namespace Ling\DocTools\Info;




/**
 * The MethodInfo class represents information about a method (of a class).
 */
class MethodInfo implements InfoInterface
{


    /**
     * This property holds the visibility of the method.
     *
     * @var string (public|protected|private)
     */
    protected $visibility;

    /**
     * This property holds a <@kw(CommentInfo) instance.
     * @var CommentInfo
     */
    protected $comment;

    /**
     * This property holds the signature for this instance.
     * @var string
     */
    protected $signature;

    /**
     * This property holds the name for this instance.
     * @var string
     */
    protected $name;


    /**
     * This property holds the return type of the method.
     * The return type is given by the "@return" tag.
     *
     * See @class(DocTools\Helper\CommentHelper)::$propertyReturnTagTypes for more info.
     *
     * The default value is void.
     *
     *
     * @var string
     * @return string
     */
    protected $returnType;

    /**
     * This property holds the return description of the method, given by the "@return" tag.
     *
     * @var string
     * @return string
     */
    protected $returnDescription;


    /**
     * This property holds the reflection method associated with this class.
     *
     * @var \ReflectionMethod
     */
    protected $reflectionMethod;

    /**
     * This property holds the parameters for this instance.
     * @var ParameterInfo[]
     */
    protected $parameters;


    /**
     * Builds the MethodInfo instance.
     */
    public function __construct()
    {
        $this->visibility = null;
        $this->comment = null;
        $this->signature = null;
        $this->name = null;
        $this->reflectionMethod = null;
        $this->returnType = "void";
        $this->returnDescription = "";
        $this->parameters = [];
    }

    /**
     * Returns the visibility of the method.
     * @return string
     */
    public function getVisibility(): string
    {
        return $this->visibility;
    }


    /**
     * Sets the visibility for this method.
     * Possible values are: public, protected, and private.
     *
     *
     * @param string $visibility
     * @return $this
     */
    public function setVisibility(string $visibility)
    {
        $this->visibility = $visibility;
        return $this;
    }

    /**
     * Returns the @kw(CommentInfo) instance.
     *
     * @return CommentInfo
     */
    public function getComment(): CommentInfo
    {
        return $this->comment;
    }

    /**
     * Sets the comment for this instance.
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
     * Returns the signature of this method.
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }


    /**
     * Sets the signature.
     *
     * @param string $signature
     * @return $this
     */
    public function setSignature(string $signature)
    {
        $this->signature = $signature;
        return $this;
    }

    /**
     * Returns the name of the method.
     *
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Sets the name of the method.
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Returns the reflectionMethod of this instance.
     *
     * @return \ReflectionMethod
     */
    public function getReflectionMethod(): \ReflectionMethod
    {
        return $this->reflectionMethod;
    }

    /**
     * Sets the reflectionMethod.
     * @param \ReflectionMethod $reflectionMethod
     */
    public function setReflectionMethod(\ReflectionMethod $reflectionMethod)
    {
        $this->reflectionMethod = $reflectionMethod;
    }

    /**
     * Returns the declaringClass of this instance.
     *
     * @return string
     */
    public function getDeclaringClass(): string
    {
        return $this->reflectionMethod->getDeclaringClass()->getName();
    }

    /**
     * Returns the returnType of this instance.
     *
     * @return string
     */
    public function getReturnType(): string
    {
        return $this->returnType;
    }

    /**
     * Sets the returnType.
     *
     * @param string $returnType
     */
    public function setReturnType(string $returnType)
    {
        $this->returnType = $returnType;
    }


    /**
     * Sets the returnDescription.
     *
     * @param string $returnDescription
     */
    public function setReturnDescription(string $returnDescription)
    {
        $this->returnDescription = $returnDescription;
    }


    /**
     * Returns whether the method has at least one parameter.
     *
     * @return bool
     */
    public function hasParameters()
    {
        return ($this->getReflectionMethod()->getNumberOfParameters() > 0);
    }


    /**
     * Adds a DocTools\Info\ParameterInfo to this instance.
     *
     * @param ParameterInfo $param
     */
    public function addParameter(ParameterInfo $param)
    {
        $this->parameters[] = $param;
    }

    /**
     * Returns the parameters of this instance.
     *
     * @return ParameterInfo[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * Returns the returnDescription of this instance.
     *
     * @return string
     */
    public function getReturnDescription(): string
    {
        return $this->returnDescription;
    }




}