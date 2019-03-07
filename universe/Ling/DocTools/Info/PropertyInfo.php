<?php


namespace Ling\DocTools\Info;


/**
 * The PropertyInfo class represents information about a property (of a class).
 */
class PropertyInfo implements InfoInterface
{


    /**
     * This property holds the doc comment of the property if any.
     *
     * @var CommentInfo $comment
     */
    protected $comment;

    /**
     * This property holds the name of the property.
     * @var string
     */
    protected $name;

    /**
     * This property holds the signature of the property.
     * @var string
     */
    protected $signature;


    /**
     * This property holds the visibility of this property.
     *
     * @var string (public|protected|private)
     */
    protected $visibility;


    /**
     * This property holds the type of the property.
     * The type is given by the "@var" tag.
     * See @class(Ling\DocTools\Helper\CommentHelper)::$propertyVarTagTypes for more info.
     *
     *
     * @var string
     * @return string
     */
    protected $type;


    /**
     * This property holds the \ReflectionProperty instance describing this property.
     *
     * @var \ReflectionProperty
     */
    protected $reflectionProperty;


    /**
     * Builds the PropertyInfo instance.
     */
    public function __construct()
    {
        $this->visibility = null;
        $this->comment = null;
        $this->name = null;
        $this->signature = null;
        $this->reflectionProperty = null;
        $this->type = "string";
    }


    /**
     * Returns the @doc(CommentInfo) instance for this property.
     * @return CommentInfo
     */
    public function getComment(): CommentInfo
    {
        return $this->comment;
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
     * Returns the name of this property.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Sets the name of this property.
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
     * Returns the signature for this property.
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Sets the signature for this property.
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
     * Returns the visibility of this instance.
     * It can be one of:
     * - public
     * - protected
     * - private
     *
     * @return string
     */
    public function getVisibility(): string
    {
        return $this->visibility;
    }

    /**
     * Sets the visibility.
     * @param string $visibility
     */
    public function setVisibility(string $visibility)
    {
        $this->visibility = $visibility;
    }

    /**
     * Returns the declaringClass of this instance.
     *
     * @return string
     */
    public function getDeclaringClass(): string
    {
        return $this->reflectionProperty->getDeclaringClass()->getName();
    }


    /**
     * Returns the reflectionProperty of this instance.
     *
     * @return \ReflectionProperty
     */
    public function getReflectionProperty(): \ReflectionProperty
    {
        return $this->reflectionProperty;
    }

    /**
     * Sets the reflectionProperty.
     *
     * @param \ReflectionProperty $reflectionProperty
     */
    public function setReflectionProperty(\ReflectionProperty $reflectionProperty)
    {
        $this->reflectionProperty = $reflectionProperty;
    }

    /**
     * Returns the default value of this property, or null if there is no default value.
     *
     * @return string|null
     */
    public function getDefaultValue()
    {
        $default = null;
        $props = $this->reflectionProperty->getDeclaringClass()->getDefaultProperties();
        if (array_key_exists($this->getName(), $props)) {
            $default = $props[$this->getName()];
        }
        return $default;
    }

    /**
     * Returns the type of this instance.
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type.
     *
     * @param string|null $type
     */
    public function setType(?string $type)
    {
        $this->type = $type;
    }
}