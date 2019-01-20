<?php

namespace BabyYaml\Reader\StringParser\ExpressionDiscoverer\Container;

use BabyYaml\Reader\StringParser\ExpressionDiscoverer\HybridExpressionDiscoverer;
use BabyYaml\Reader\StringParser\ExpressionDiscoverer\SimpleQuoteExpressionDiscoverer;
use BabyYaml\Reader\StringParser\ExpressionDiscovererModel\ExpressionDiscovererModel;


/**
 * SequenceContainerExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-14
 *
 *
 * By default:
 * A sequence contains expressions separated by a comma (,)
 * A sequence starts with the open bracket symbol ([)
 * A sequence ends with the close bracket symbol (])
 *
 * By default, implicit values are accepted and equals null,
 * but you can turn them off with the setImplicitValues() method, or maybe change
 *                  their default value (involves extending this class)
 *
 * 
 * By default, accepted expressions are:
 * 
 *  - another sequence
 *  - quoted string with simple escape
 *  - hybrid
 * 
 *
 */
class SequenceContainerExpressionDiscoverer extends ValueContainerExpressionDiscoverer
{

    public function __construct()
    {
        parent::__construct();
        $this
            ->setBeginSep('[')
            ->setEndSep(']')
            ->setValueSep(',')
            ->setNotSignificantSymbols([' ', "\t"])
            ->setImplicitValues(true);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getDiscoverers()
    {
        if (empty(parent::getDiscoverers())) {
            $this->setDiscoverers($this->getDefaultDiscoverers());
        }
        return parent::getDiscoverers();
    }
    
    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getDefaultDiscoverers()
    {
        $modelSeq = new ExpressionDiscovererModel($this);
        $quote = new SimpleQuoteExpressionDiscoverer();
        return [
            $modelSeq,
            $quote,
            HybridExpressionDiscoverer::create(),
        ];
    }

}
