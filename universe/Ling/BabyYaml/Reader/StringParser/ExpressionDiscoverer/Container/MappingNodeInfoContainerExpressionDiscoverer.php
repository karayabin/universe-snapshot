<?php


namespace Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\Container;


/**
 * The MappingNodeInfoContainerExpressionDiscoverer class.
 */
class MappingNodeInfoContainerExpressionDiscoverer extends MappingContainerExpressionDiscoverer
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
                $p = explode('}', $string, 2);
                $comment = array_pop($p);
                call_user_func($this->onCommentFound, $comment);
            }
        }

        if (null !== $this->onSuccess) {
            call_user_func($this->onSuccess);
        }
    }
}
