<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Exception;


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
