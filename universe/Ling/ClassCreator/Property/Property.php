<?php


namespace Ling\ClassCreator\Property;


use Ling\ClassCreator\Comment\Comment;


/**
 * The Property class represents a property to create.
 */
class Property
{

    /**
     * This property holds the comment of this property.
     * @var Comment
     */
    private $comment;

    /**
     * This property holds the signature of this property.
     * @var string=null
     */
    private $signature;


    /**
     * Builds the Property instance.
     */
    public function __construct()
    {
        $this->comment = null;
        $this->signature = null;
    }

    /**
     * Returns a new instance of this property class.
     *
     * @return Property
     */
    public static function create()
    {
        return new static();
    }


    /**
     * Sets the comment for this property.
     *
     * @param Comment $comment
     * @return $this
     */
    public function setComment(Comment $comment)
    {
        $this->comment = $comment;
        return $this;
    }


    /**
     * Sets the signature for this property.
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
     * Returns the comment of this property.
     *
     * @return Comment|null
     */
    public function getComment()
    {
        return $this->comment;
    }


    /**
     * Returns the signature of this property.
     *
     * @return string|null
     */
    public function getSignature()
    {
        return $this->signature;
    }


}