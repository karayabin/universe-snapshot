<?php


namespace Ling\ClassCreator\Method;


use Ling\ClassCreator\Comment\Comment;

/**
 * The Method class represents a method to create.
 *
 */
class Method
{

    /**
     * This property holds the signature of the method to create.
     * For instance:
     *
     * - public function doo()
     * - private static function help ( $topic, Formatter $formatter )
     *
     * @var string|null
     */
    protected $signature;

    /**
     * This property holds the body of the method to create.
     *
     * @var string=null
     */
    protected $body;


    /**
     * This property holds the comment of this method to create.
     * @var Comment
     */
    protected $comment;


    /**
     * Returns a new instance of this method class.
     * @return Method
     */
    public static function create()
    {
        return new static();
    }

    /**
     * Returns the Method instance.
     */
    public function __construct()
    {
        $this->signature = null;
        $this->body = null;
        $this->comment = null;
    }

    /**
     * Sets the signature of this method.
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
     * Sets the body of this method.
     *
     * @param $body
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Sets the comment of this method.
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
     * Returns the signature of this method.
     *
     * @return string|null
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Returns the body of this method.
     *
     * @return string|null
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Returns the comment of this method.
     *
     * @return Comment|null
     */
    public function getComment()
    {
        return $this->comment;
    }


}