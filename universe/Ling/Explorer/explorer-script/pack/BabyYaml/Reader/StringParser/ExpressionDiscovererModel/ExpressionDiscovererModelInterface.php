<?php


namespace BabyYaml\Reader\StringParser\ExpressionDiscovererModel;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\ExpressionDiscovererInterface;


/**
 * ExpressionDiscovererModelInterface
 * @author Lingtalfi
 * 2015-05-12
 * 
 */
interface ExpressionDiscovererModelInterface {


    /**
     * @return ExpressionDiscovererInterface
     */
    public function getExpressionDiscoverer();
}
