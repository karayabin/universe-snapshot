<?php

namespace Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\Container;


/**
 * The SequenceNodeInfoContainerExpressionDiscoverer class.
 */
class SequenceNodeInfoContainerExpressionDiscoverer extends SequenceContainerExpressionDiscoverer
{


    /**
     * This property holds the onCommentFound for this instance.
     * @var callable
     */
    protected $onCommentFound;

    /**
     * This property holds the onSuccess for this instance.
     * @var callable
     */
    protected $onSuccess;

    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->onCommentFound = null;
        $this->onSuccess = null;
    }

    /**
     * Sets the onCommentFound.
     *
     * @param callable $onCommentFound
     */
    public function setOnCommentFound(callable $onCommentFound)
    {
        $this->onCommentFound = $onCommentFound;
    }

    /**
     * Sets the onSuccess.
     *
     * @param callable $onSuccess
     */
    public function setOnSuccess(callable $onSuccess)
    {
        $this->onSuccess = $onSuccess;
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function onParseSuccessful(string $string, $value)
    {
        if (null !== $this->onCommentFound) {
            if (false !== strpos($string, '#')) {
                $p = preg_split('!\](\s+#)!', $string, 2, \PREG_SPLIT_DELIM_CAPTURE);
                $comment = $p[1] . $p[2];
                call_user_func($this->onCommentFound, $comment);
            }
        }

        if (null !== $this->onSuccess) {
            call_user_func($this->onSuccess);
        }
    }


}
