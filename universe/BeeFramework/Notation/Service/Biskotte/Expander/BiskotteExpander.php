<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Service\Biskotte\Expander;

use BeeFramework\Notation\Service\Biskotte\Exception\BiskotteException;
use BeeFramework\Notation\Service\Biskotte\StringParser\MethodCallExpressionDiscoverer;
use BeeFramework\Notation\Service\Biskotte\StringParser\ResultOfExpressionDiscoverer;
use BeeFramework\Notation\String\StringParser\ExpressionFinder\ExpressionFinder;


/**
 * BiskotteExpander
 * @author Lingtalfi
 * 2015-05-26
 *
 */
class BiskotteExpander
{

    private $methodCallFinder;
    private $resultOfFinder;

    public function __construct()
    {
        $this->methodCallFinder = ExpressionFinder::create()->setDiscoverer(MethodCallExpressionDiscoverer::create());
        $this->resultOfFinder = ExpressionFinder::create()->setDiscoverer(ResultOfExpressionDiscoverer::create());
    }


    public static function create()
    {
        return new static();
    }

    public function expand(array &$biscotteArray)
    {
        $this->expandResultOf($biscotteArray);
        $this->expandCalls($biscotteArray);
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function expandResultOf(array &$biscotteArray)
    {
        array_walk($biscotteArray, function (&$v, $k) {
            if (
                '_args' === $k ||
                '_concat' === $k 
            ) {
                if (is_array($v)) {
                    array_walk($v, function (&$w) {
                        if (is_string($w)) {
                            if (false !== $this->resultOfFinder->find($w)) {
                                $val = $this->resultOfFinder->getValue();
                                $this->arrangeParams($val);
                                $w = $val;
                            }
                        }
                    });
                }
                else {
                    $this->syntaxError("_args/_concat must be an array");
                }
            }

            if (is_array($v)) {
                $this->expandResultOf($v);
            }
        });
    }

    private function expandCalls(array &$biscotteArray)
    {
        array_walk($biscotteArray, function (&$v, $k) {
            if ('_calls' === $k) {
                if (is_array($v)) {
                    array_walk($v, function (&$w) {
                        if (is_string($w)) {
                            $this->methodCallFinder->find($w);
                            if (null !== $val = $this->methodCallFinder->getValue()) {
                                $this->arrangeParams($val);
                                $w = $val;
                            }
                            else {
                                $this->syntaxError("Invalid methodCall as string");
                            }
                        }
                    });
                }
                else {
                    $this->syntaxError("_calls must be an array");
                }
            }

            if (is_array($v)) {
                $this->expandCalls($v);
            }
        });
    }


    private function syntaxError($m)
    {
        $m = 'Syntax error: ' . $m;
        throw new BiskotteException($m);
    }

    private function logicError($m)
    {
        $m = 'Logic error: ' . $m;
        throw new BiskotteException($m);
    }

    private function arrangeParams(array &$params)
    {
        if (
            array_key_exists('_type', $params) &&
            array_key_exists('_func', $params) &&
            array_key_exists('_params', $params)
        ) {
            $type = $params['_type'];
            $func = $params['_func'];
            $args = $params['_params'];

            if ('MethodCallExpressionDiscoverer' === $type) {
                $type = 'methodCall';
            }
            elseif ('ResultOfExpressionDiscoverer' === $type) {
                $type = 'resultOf';
            }
            else {
                $this->logicError("Unknown Function ExpressionDiscoverer type: $type");
            }
            unset($params['_type']);
            unset($params['_func']);
            unset($params['_params']);
            $func = trim(substr($func[0], 0, -1));


            if ('methodCall' === $type) {
                $params['_method'] = $func;
            }
            elseif ('resultOf' === $type) {
                $params['_resultOf'] = $func;
            }
            else {
                throw new \RuntimeException("Not implemented yet");
            }


            foreach ($args as $k => $v) {
                if (is_array($v)) {
                    $this->arrangeParams($v);
                }
                $args[$k] = $v;
            }
            $params['_args'] = $args;
        }
    }
}
