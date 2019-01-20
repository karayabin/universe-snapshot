<?php

namespace BabyYaml\Reader\StringParser\ExpressionDiscovererModel;
use BabyYaml\Reader\StringParser\ExpressionDiscoverer\ExpressionDiscovererInterface;


/**
 * ExpressionDiscovererModel
 * @author Lingtalfi
 * 2015-05-12
 *
 */
class ExpressionDiscovererModel implements ExpressionDiscovererModelInterface
{

    private $discoverer;

    public function __construct(ExpressionDiscovererInterface $discoverer)
    {
        $this->discoverer = $discoverer;
    }
    

    //------------------------------------------------------------------------------/
    // IMPLEMENTS ExpressionDiscovererModelInterface
    //------------------------------------------------------------------------------/
    /**
     * @return ExpressionDiscovererInterface
     */
    public function getExpressionDiscoverer()
    {
        return clone $this->discoverer;
    }


}
