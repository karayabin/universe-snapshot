<?php


namespace Ling\BabyYaml\Reader\MultiLineDelimiter;


/**
 * SingleCharCommentsMultiLineDelimiter
 */
class SingleCharCommentsMultiLineDelimiter extends SingleCharMultiLineDelimiter
{

    /**
     * This property holds the @page(commentItems) for this instance.
     * @var array
     */
    protected $comments;

    /**
     * This property holds the onCommentFoundCallback for this instance.
     * @var callable
     */
    protected $onCommentFoundCallback;

    public function __construct(array $options = [])
    {
        parent::__construct($options);
        $this->comments = [];
        $this->onCommentFoundCallback = null;
    }

    /**
     * Returns the comments of this instance.
     *
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * Sets the onCommentFoundCallback.
     *
     * The given callable takes the same arguments as @page(the onCommentFound method of this class).
     *
     * @param callable $onCommentFoundCallback
     */
    public function setOnCommentFoundCallback(callable $onCommentFoundCallback)
    {
        $this->onCommentFoundCallback = $onCommentFoundCallback;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overries
     */
    protected function onCommentFound(string $comment, string $line, bool $isBegin)
    {
        $symbol = (true === $isBegin) ? $this->startChar : $this->endChar;
        $p = explode($symbol, $line, 2);
        $comment = array_pop($p);
        call_user_func($this->onCommentFoundCallback, $comment, $isBegin);
    }


}
