<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Service\Biscotte\Util;

use BeeFramework\Component\Error\CodifiedErrors\Tools\CodifiedErrorsTool;
use BeeFramework\Notation\Service\Biscotte\LineParser\BiscotteInlineArgsParser;
use BeeFramework\Notation\String\LineParser\NotationParser\NotationParserInterface;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\ExpressionDiscovererInterface;


/**
 * BiscotteParserExpanderUtil
 * @author Lingtalfi
 * 2015-03-07
 *
 */
class BiscotteParserExpanderUtil
{

    /**
     * @var ExpressionDiscovererInterface
     */
    private $inlineArgsParser;

    public function __construct()
    {
        $this->inlineArgsParser = new BiscotteInlineArgsParser();
    }


    public function expand(array &$targetArray)
    {
        array_walk_recursive($targetArray, function (&$v) {
            if (false !== $lines = $this->getExpandedArray($v)) {
                $v = $lines;
            }
        });
    }


    protected function getExpandedArray($value)
    {
        // this method's output does not end with the semi-column
        $ret = false;
        if (')' === substr($value, -1)) {
            if (
                '@' === substr($value, 0, 1) ||
                '::' === substr($value, 0, 2)
            ) {
                if (false !== $pos = strpos($value, '(')) {
                    $hasError = false;
                    $argsLine = substr($value, $pos + 1, -1);
                    $isService = false;

                    if ('@' === substr($value, 0, 1)) {
                        $isService = true;
                        $serviceCall = trim(substr($value, 1, $pos - 1));
                        // service inline notation
                        $p = explode('->', $serviceCall, 2);
                        if (2 === count($p)) {
                            $ret = [
                                '_resultOf' => '@' . $p[0] . '->' . $p[1],
                            ];
                        }
                        else {
                            $this->syntaxError(sprintf("inline service notation must contain the -> operator between the service address and the called method, in expression %s", $value));
                            $hasError = true;
                        }
                    }
                    else {
                        // static inline notation
                        $staticCall = trim(substr($value, 2, $pos - 2));
                        $p = explode('::', $staticCall, 2);
                        if (2 === count($p)) {
                            $ret = [
                                '_resultOf' => $p[0] . '::' . $p[1],
                            ];
                        }
                        else {
                            $this->syntaxError(sprintf("inline static notation must contain the :: symbol between the className and the called method, in expression %s", $value));
                            $hasError = true;
                        }
                    }
                    if (false === $hasError) {
                        if (true === $this->inlineArgsParser->parse($argsLine)) {
                            $ret['_args'] = $this->inlineArgsParser->getValue();
                        }
                        else {
                            if (true === $isService) {
                                $s = "for the service " . $p[0];
                            }
                            else{
                                $s = "for the static class " . $p[0];
                            }
                            $this->syntaxError("problem with the parsing of inline arguments $s");
                        }
                    }
                }
                else {
                    $this->syntaxError(sprintf("inline service/static method call notation must contain the '(' symbol; expression was %s", $value));
                }
            }
        }
        return $ret;
    }


    private function syntaxError($msg)
    {
        throw new \RuntimeException(sprintf("Syntax error: %s", $msg));
    }
}
