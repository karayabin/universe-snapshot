<?php


namespace Ling\ClassCreator\Comment;


/**
 * The Comment class represents a comment.
 *
 */
class Comment
{

    /**
     * This property holds the type of the comment.
     *
     * It can be one of:
     * - multiple: a multiple line comment
     * - docBlock: a doc block multi line comment
     * - oneLine: a single line comment in c++ style
     * - oneLineShell: a single line comment in shell style
     *
     *
     * @var string
     */
    private $type;


    /**
     * This property holds the body of the comment.
     *
     * @var null
     */
    private $message;


    /**
     * Builds the Comment instance.
     */
    public function __construct()
    {
        $this->type = 'multiple';
        $this->message = null;
    }

    /**
     * Returns the type.
     *
     * See more info in the class description.
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type of comment.
     *
     * @param $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Returns the body of the comment.
     *
     * @return string|null
     */
    public function getMessage()
    {
        return $this->message;
    }


    /**
     * Sets the message/body of the comment.
     *
     * @param $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }


}