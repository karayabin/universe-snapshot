<?php

namespace Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer;


/**
 * HybridNodeInfoExpressionDiscoverer
 *
 */
class HybridNodeInfoExpressionDiscoverer extends HybridExpressionDiscoverer implements GreedyExpressionDiscovererInterface
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


    /**
     * @overrides
     */
    public function parse($string, $pos = 0)
    {
        $ret = parent::parse($string, $pos);
        if (true === $ret) {
            if (null !== $this->onSuccess) {
                call_user_func($this->onSuccess);
            }
        }
        return $ret;
    }








    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @param string $string
     * @overrideMe
     */
    protected function onSymbolDetected(string $string)
    {
        /**
         * We know that those values can't contain the hash symbol (because they can't have quotes around them),
         * so we can use preg_match here to get the comment with the relevant indentation prefix.
         */

        if (preg_match('!\s+#.*!', $string, $match)) {
            $comment = $match[0];
            $this->comments[] = [
                'inline-value',
                $comment,
            ];
        }

    }
}
