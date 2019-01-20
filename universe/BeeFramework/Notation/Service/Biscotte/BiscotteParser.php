<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Service\Biscotte;

use BeeFramework\Notation\Service\Biscotte\Exception\BiscotteParserException;
use BeeFramework\Notation\String\LineParser\NotationParser\NotationParserInterface;
use BeeFramework\Notation\WrappedString\Tool\CandyResolverTool;


/**
 * BiscotteParser
 * @author Lingtalfi
 * 2015-03-03
 *
 */
class BiscotteParser implements BiscotteParserInterface
{

    protected $references;
    protected $options;
    private $address;
    private $cpt;
    private $refSymbol;
    private $refSymbolLen;


    public function __construct(array $options = [])
    {
        $this->options = array_replace([
            /**
             * Used to indent the produced php code
             */
            'indentFactor' => 4,
            'indentSymbol' => ' ',
            /**
             * If a ContainerInterface is given, biscotte will try to
             * resolve standalone references, using the container.parameters as the referenceArray
             * (see ArrayWithReferences for terminology).
             * Note:
             *      biscotte will use the parameters value without any further modifications,
             *      therefore container.parameters should be resolved (and/or frozen) already.
             *
             */
            'container' => null,
            /**
             * The reference symbol (ArrayWithReferences).
             * Only used if container is a ContainerInterface.
             */
            'refSymbol' => '§',
            /**
             * What php code to write when a call to a service is required?
             */
            'getServiceAdaptor' => function ($address, $recreate, $mandatory) {
                $sRecreate = (true === $recreate) ? 'true' : 'false';
                $sMode = (true === $mandatory) ? '0' : '2';
                return '$this->getService(\'' . $address . '\', ' . $sRecreate . ', ' . $sMode . ')';
            },
        ], $options);


        $this->refSymbol = $this->options['refSymbol'];
        $this->refSymbolLen = strlen($this->refSymbol);
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS BiscotteParserInterface
    //------------------------------------------------------------------------------/
    public function parseValue($value, $address)
    {
        $this->address = $address;
        $this->cpt = 0;
        $this->references = [];
        $ret = $this->parseInstantiation($value);
        if (false !== $ret && $this->references) {
            $s = implode(PHP_EOL, $this->references);
            $ret = $s . PHP_EOL . PHP_EOL . $ret;
        }
        return $ret;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function parseInstantiation($value, array $options = [])
    {
        $ret = false;
        if (is_array($value)) {
            $class = null;
            if (
                array_key_exists('_class', $value) ||
                array_key_exists('_static', $value)
            ) {
                $ret = '';
                $indent = 0;
                $options = array_replace([
                    'varName' => 'o',
                    'return' => true,
                ], $options);
                if (array_key_exists('_class', $value)) {
                    $class = $value['_class'];
                }
                else {
                    $class = $value['_static'];
                }
                if (is_string($class)) {
                    $varName = $options['varName'];
                    if ('_class' === key($value)) {
                        $ret .= $this->line('$' . $varName . ' = new ' . $class . '(', $indent);
                    }
                    else {
                        $ret .= $this->line('$' . $varName . ' = ' . $class . '(', $indent);
                    }
                    $this->handleArgs($ret, $value, $indent, ');');
//                    $this->parseCalls($ret, $value, $indent, ');', ['varName' => $options['varName']]);
                    $this->parseCalls($ret, $value, $indent, ['varName' => $options['varName']]);

                    if (true === $options['return']) {
                        $ret .= PHP_EOL;
                        $ret .= $this->line('return $' . $varName . ';', $indent);
                    }
                }
                else {
                    $this->syntaxError(sprintf("_class or _static property must be of type string, %s given", gettype($class)));
                }
            }
        }
        return $ret;
    }

    protected function parseCalls(&$ret, $value, $indent, array $options = [])
    {
        if (array_key_exists('_calls', $value)) {
            $calls = $value['_calls'];
            if (is_array($calls)) {
                if ($calls) {

                    $options = array_replace([
                        'varName' => 'o',
                    ], $options);

                    foreach ($calls as $call) {
                        if (is_array($call)) {
                            if (array_key_exists('_method', $call)) {
                                $method = $call['_method'];
                                if (is_string($method)) {
                                    $ret .= PHP_EOL;
                                    $ret .= $this->line('$' . $options['varName'] . '->' . $method . '(', $indent);
                                    $this->handleArgs($ret, $call, $indent, ');');
                                }
                                else {
                                    $this->syntaxError("_method must be a string");
                                }
                            }
                            else {
                                $this->syntaxError("Every _call entry must contain the _method key");
                            }
                        }
                        else {
                            $this->syntaxError("Every _call entry must be an array");
                        }
                    }
                }
            }
            else {
                $this->syntaxError("_calls must be of type array");
            }
        }
    }

    protected function handleArgs(&$ret, array $value, $indent, $eol)
    {
        if (array_key_exists('_args', $value)) {
            $args = $value['_args'];
            if (is_array($args)) {
                $ret .= $this->parseArguments($args, $indent + 1);
                $ret .= PHP_EOL;
                $ret .= $this->line($eol, $indent);
            }
            else {
                $this->syntaxError("_args must be of type array");
            }
        }
        else {
            $ret .= $this->line($eol, $indent, true);
        }
    }

    private function parseArguments(array $args, $indent = 1, $targetIsMethod = true)
    {
        $sArgs = '';
        $c = 0;
        // the arguments will be either be included in a method's signature (method), or used inside an array [].
        // this will be false probably only for recursive arguments parsing
        if (false === $targetIsMethod) {
            $sArgs .= $this->line('[', $indent);
            $indent++;
        }
        if ($args) {
            $sArgs .= PHP_EOL;
            foreach ($args as $k => $v) {
                /**
                 * Note: if the target is a method, we don't need the keys.
                 */
                if (0 !== $c && true === $targetIsMethod) {
                    $sArgs .= ',' . PHP_EOL;
                }

                $skipIndent = false;
                if (false === $targetIsMethod) {
                    $sArgs .= $this->line(var_export($k, true) . ' => ', $indent);
                    $skipIndent = true;
                }

                /**
                 * Resolving the argument's value
                 */
                if (false !== $sExec = $this->parseResultOf($v, $indent)) {
                    // _resultOf
                    $sArgs .= $this->line($sExec, $indent, $skipIndent);
                }
                elseif (false !== $sNested = $this->parseNestedInstantiation($v, $indent)) {
                    // a _class inside a _class' args
                    $sArgs .= $this->line($sNested, $indent, $skipIndent);
                }
                elseif (is_array($v)) {
                    // recursive arguments parsing
                    $v = $this->parseArguments($v, $indent, false);
                    $sArgs .= $v;
                }
                else {
                    $isValue = true; // <value> | <service> | <inlineMethodCall>
                    if (is_string($v)) {
                        // <service>
                        $v = trim($v);

//                        if (false !== $r = $this->parseInlineResultOf($v, $indent)) {
//                            $sArgs .= $this->line($r, $indent, $skipIndent);
//                            $isValue = false;
//                        }
//                        else
                        if ('@' === substr($v, 0, 1)) {
                            $sArgs .= $this->line($this->parseService($v), $indent, $skipIndent);
                            $isValue = false;
                        }
                        elseif (false !== $val = $this->parseStandaloneReference($v)) {
                            /**
                             * container params are resolved already at this stage
                             */
                            $v = $val;
                        }
                    }

                    // <value>
                    if (true === $isValue) {
                        $sArgs .= $this->line(var_export($v, true), $indent, $skipIndent);
                    }
                }
                if (false === $targetIsMethod) {
                    $sArgs .= ',' . PHP_EOL;
                }
                $c++;
            }
        }
        if (false === $targetIsMethod) {
            $indent--;
            $sArgs .= $this->line(']', $indent);
        }
        return $sArgs;

    }

    protected function parseStandaloneReference($value)
    {
        $ret = false;
        if (false !== $inner = CandyResolverTool::getStandaloneReferenceValue($value, $this->refSymbol, 1)) {
            $ret = $this->options['container']->getParameter($inner);
        }
        return $ret;
    }

    protected function parseNestedInstantiation($value, $indent)
    {
        $ret = false;
        $var = $this->getNewVarName();
        if (false !== $r = $this->parseInstantiation($value, [
                'varName' => $var,
                'return' => false,
            ])
        ) {
            $ret = '$' . $var;
            $this->references[$var] = $r;
        }
        return $ret;
    }


    protected function parseResultOf($value, $indent)
    {
        // this method's output does not end with the semi-column
        $ret = false;
        if (
            is_array($value) &&
            array_key_exists('_resultOf', $value)
        ) {
            $resultOf = $value['_resultOf'];
            if (is_string($resultOf)) {
                $ret = '';
                if ('@' === substr($resultOf, 0, 1)) {
                    $p = explode('->', $resultOf);
                    if (2 === count($p)) {
                        $ret .= $this->parseService($p[0]) . '->' . $p[1] . '(';
                    }
                    else {
                        $this->syntaxError("_resultOf, when used with service notation must contain the -> symbol");
                    }
                }
                else {
                    if (false === strpos($resultOf, '::')) {
                        $this->syntaxError("_resultOf, when used with static notation must contain the :: symbol");
                    }
                    $ret .= $resultOf . '(';
                }
                $this->handleArgs($ret, $value, $indent, ')');
            }
            else {
                $this->syntaxError("_resultOf must be a string");
            }
        }
        return $ret;
    }

    protected function parseService($value)
    {

        $address = trim($value, '@');
        $recreate = ('+' === substr($address, -1));
        $isMandatory = ('?' !== substr($address, 0, 1));
        if (true === $recreate) {
            $address = substr($address, 0, -1);
        }
        if (false === $isMandatory) {
            $address = substr($address, 1);
        }
        $s = call_user_func($this->options['getServiceAdaptor'], $address, $recreate, $isMandatory);
        if (is_string($s)) {
            return $s;
        }
        else {
            $this->syntaxError(sprintf("getServiceAdaptor callback must return a string (called with address: %s)", $address));
            return false;
        }
    }


    private function line($msg, $indent, $skipIndent = false)
    {
        if (true === $skipIndent) {
            return $msg;
        }
        return str_repeat($this->options['indentSymbol'], $indent * $this->options['indentFactor']) . $msg;
    }

    protected function syntaxError($msg)
    {
        $msg = 'Syntax error within key %s: ' . $msg;
        throw new BiscotteParserException(sprintf($msg, $this->address));
    }

    private function getNewVarName()
    {
        return 'a' . $this->cpt++;
    }

}
