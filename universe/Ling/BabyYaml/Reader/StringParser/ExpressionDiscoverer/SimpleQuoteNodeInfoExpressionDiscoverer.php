<?php

namespace Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer;


/**
 * SimpleQuoteNodeInfoExpressionDiscoverer
 */
class SimpleQuoteNodeInfoExpressionDiscoverer extends SimpleQuoteExpressionDiscoverer
{


    /**
     * This property holds the @page(commentItems) for this instance.
     * @var array
     */
    protected $comments = [];


    /**
     * This property holds the onSuccess for this instance.
     * @var callable|null
     */
    protected $onSuccess = null;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->comments = [];
        $this->onSuccess = null;
    }


    /**
     * Returns the comments of this instance, and empties them.
     *
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * Resets the comments
     */
    public function resetComments()
    {
        $this->comments = [];
    }

    /**
     * Sets the onSuccess.
     *
     * @param callable $onSuccess
     */
    public function setOnSuccess(?callable $onSuccess)
    {
        $this->onSuccess = $onSuccess;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function onValueDiscovered(string $string, int $lastPos)
    {
        $rest = substr($string, $lastPos);
        $p = explode('#', $rest, 2);
        if (2 === count($p)) {
            $comment = substr($rest, 1);
            $this->comments[] = [
                'inline-value',
                $comment,
            ];
        }

        if (null !== $this->onSuccess) {
            call_user_func($this->onSuccess);
        }
    }


}
