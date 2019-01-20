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
use BeeFramework\Notation\String\StringParser\ExpressionFinder\CleanStartExpressionFinder;
use BeeFramework\Notation\String\StringParser\ExpressionFinder\ExpressionFinder;
use CrazyBeeFramework\MultiByteString\MultiByteStringPositionsTable\Tool\MultiByteStringPositionsTableTool;


/**
 * BiskotteExpander
 * @author Lingtalfi
 * 2015-05-26
 * 
 * 
 * I tried to implement _concat system using inline notation but failed...
 *
 */
class BiskotteExpanderDepr
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
        // order of steps is important
        $this->expandResultOf($biscotteArray);
        $this->expandCalls($biscotteArray);
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function expandResultOf(array &$biscotteArray)
    {
        array_walk($biscotteArray, function (&$v, $k) {
            if ('_args' === $k) {
                if (is_array($v)) {

                    $this->doExpandResultOf($v);

                } else {
                    $this->syntaxError("_args must be an array");
                }
            }

            if (is_array($v)) {
                $this->expandResultOf($v);
            }
        });
    }


    private function doExpandResultOf(array &$v)
    {
        array_walk($v, function (&$w) {
            if (is_string($w)) {

                $allPos = [];
                $tmp = $w;
                $n = 0;
                while (false !== $pos = $this->resultOfFinder->find($tmp)) {
                    list($startPos, $endPos) = $pos;
                    $allPos[] = [$startPos, $endPos, $tmp, $this->resultOfFinder->getValue()];
                    $tmp = mb_substr($tmp, $endPos + 1);
                    $n++;
                }
                a($allPos);

                // handling inline resultOf
                if ($n > 0) {
                    if (1 === $n && 0 === $allPos[0][0]) {
                        $val = $allPos[0][3];
                        $this->arrangeParams($val);
                        $w = $val;
                    } else {
                        $concat = [];
                        foreach ($allPos as $info) {
                            list($start, $end, $substr, $value) = $info;
                            if (0 !== $start) {
                                $concat[] = mb_substr($substr, 0, $start);
                            }
                            $this->arrangeParams($value);
                            $concat[] = $value;
                        }
                        $len = mb_strlen($substr);
                        if ($len > $end + 1) {
                            $concat[] = mb_substr($substr, $end + 1);
                        }
                        $w = [
                            '_concat' => $concat,
                        ];
                    }
                }

            } elseif (is_array($w)) {
                $this->doExpandResultOf($w);
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
                            } else {
                                $this->syntaxError("Invalid methodCall as string");
                            }
                        }
                    });
                } else {
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
            } elseif ('ResultOfExpressionDiscoverer' === $type) {
                $type = 'resultOf';
            } else {
                $this->logicError("Unknown Function ExpressionDiscoverer type: $type");
            }
            unset($params['_type']);
            unset($params['_func']);
            unset($params['_params']);
            $func = trim(substr($func[0], 0, -1));


            if ('methodCall' === $type) {
                $params['_method'] = $func;
            } elseif ('resultOf' === $type) {
                $params['_resultOf'] = $func;
            } else {
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
