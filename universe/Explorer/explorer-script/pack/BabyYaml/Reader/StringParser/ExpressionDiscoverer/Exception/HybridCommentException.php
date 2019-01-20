<?php

namespace BabyYaml\Reader\StringParser\ExpressionDiscoverer\Exception;


/**
 * HybridCommentException
 * @author Lingtalfi
 * 2015-05-12
 *
 */
class HybridCommentException extends \Exception
{

    private $hybridValue;

    public function getHybridValue()
    {
        return $this->hybridValue;
    }

    public function setHybridValue($hybridValue)
    {
        $this->hybridValue = $hybridValue;
        return $this;
    }


}
