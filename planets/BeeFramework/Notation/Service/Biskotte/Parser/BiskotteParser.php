<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Service\Biskotte\Parser;

use BeeFramework\Bat\BdotTool;
use BeeFramework\Bat\VarTool;
use BeeFramework\Notation\Service\Biskotte\Expander\BiskotteExpander;
use BeeFramework\Notation\Service\Biskotte\Parser\Adaptor\BiscotteParserAdaptorInterface;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\CallMethodCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\ConcatCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\InstantiationCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\NonStaticInstantiationCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\ResultOfCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\StaticInstantiationCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Formatter\InstantiationSnippetFormatter;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Formatter\InstantiationSnippetFormatterInterface;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\InstantiationSnippet;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\SpecialArg\ServiceRefSpecialArg;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\SpecialArg\VarRefSpecialArg;
use BeeFramework\Notation\WrappedString\Tool\CandyResolverTool;


/**
 * BiskotteParser
 * @author Lingtalfi
 * 2015-05-26
 *
 *
 *
 * In this implementation, the strategy is to:
 *
 * 1. Expand (functions like) biscotte notation
 * 2. Now, safely resolve parameters across the biscotte array
 * 3. Parse the biscotte array and convert to service code
 *
 *
 * This is the default biscotte parsing strategy.
 * It has the following advantages:
 *
 *      - the parameters value can contain expanded biscotte code, since they are applied before the biscotte parser is executed,
 *                                                  but after the biscotte code has been expanded.
 *      - the parameters are hardcoded in the container, which might fasten their access a bit
 *
 */
class BiskotteParser
{

    private $expander;

    /**
     * @var InstantiationSnippetFormatterInterface
     */
    private $formatter;
    /**
     * @var InstantiationSnippet
     */
    private $instantiationSnippet;
    private $parameterWrapChar;
    private $adaptors;

    public function __construct()
    {
        $this->expander = BiskotteExpander::create();
        $this->formatter = new InstantiationSnippetFormatter();
        $this->parameterWrapChar = '§';
        $this->adaptors = [];
    }

    public static function create()
    {
        return new static();
    }

    public function setParameterWrapChar($parameterWrapChar)
    {
        $this->parameterWrapChar = $parameterWrapChar;
        return $this;
    }


    /**
     * @param array $biscotteArray
     * @param callable $onServiceFound
     *                      void    callable ( address, code )
     */
    public function parseServices(array $biscotteArray, callable $onServiceFound, array $resolvedParameters = [])
    {

        // 1. Expand biscotte notation (function like code)
        $this->expander->expand($biscotteArray);

        // 2. Now safely inject parameters into the biscotteArray
        CandyResolverTool::applyCandy($biscotteArray, $resolvedParameters, $this->parameterWrapChar, 1, false, false);

        // 3. Apply adaptors
        $this->applyAdaptors($biscotteArray);


        // 4. And now do the real biscotte notation parsing
        $this->instantiationSnippet = InstantiationSnippet::create();
        BdotTool::walk($biscotteArray, function (&$value, $key, $dotPath) use ($onServiceFound) {
            if (
                is_array($value) &&
                (
                    array_key_exists('_class', $value) ||
                    array_key_exists('_static', $value)
                )
            ) {

                if (false !== $this->parseInstantiationCode($value)) {

                    $code = $this->formatter->getCode($this->instantiationSnippet);
                    call_user_func($onServiceFound, $dotPath, $code);
                    // set value to a non array to stop the bdot.walk
                    $value = null;
                    $this->instantiationSnippet = InstantiationSnippet::create();
                }
            }
        });
    }


    public function setAdaptor(BiscotteParserAdaptorInterface $adaptor, $index = null)
    {
        if (null === $index) {
            $this->adaptors[] = $adaptor;
        }
        else {
            $this->adaptors[$index] = $adaptor;
        }
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return VarRefSpecialArg|false,
     *              returns the var ref associated with the registered element,
     *              or false in case of error.
     */
    private function parseInstantiationCode(array $code, $isOnTheFly = false)
    {
        $o = null;
        if (array_key_exists('_class', $code)) {
            if (is_string($code['_class'])) {
                $o = NonStaticInstantiationCodeSnippetElement::create()->setClassName($code['_class']);
            }
            else {
                $this->syntaxError(sprintf("_class must be of type string, %s given", gettype($code['_class'])));
            }
        }
        elseif (array_key_exists('_static', $code)) {
            if (is_string($code['_static'])) {
                $o = StaticInstantiationCodeSnippetElement::create()->setStaticMethodCall($code['_static']);
            }
            else {
                $this->syntaxError(sprintf("_static must be of type string, %s given", gettype($code['_static'])));
            }
        }
        else {
            $this->syntaxError("An instantiation code must contain either a _class or a _static property");
        }
        if ($o instanceof InstantiationCodeSnippetElement) {

            if (true === $isOnTheFly) {
                $o->setIsOnTheFly(true);
            }

            $o->setArgs($this->getResolvedArgs($code));

            if (array_key_exists('_calls', $code)) {
                if (is_array($code['_calls'])) {
                    $this->processCallsCode($code['_calls'], $o);
                }
                else {
                    $this->syntaxError(sprintf("_calls property must be an array, %s given", gettype($code['_calls'])));
                }
            }


            $varRef = $this->instantiationSnippet->registerInstantiationElement($o);
            return $varRef;
        }
        return false;
    }

    private function processResultOfCode(array $code)
    {
        $o = ResultOfCodeSnippetElement::create()->setResultOfString($code['_resultOf']);
        $o->setArgs($this->getResolvedArgs($code));
        $varRef = $this->instantiationSnippet->registerResultOfElement($o);
        return $varRef;
    }

    private function processConcatCode(array $code)
    {
        $fragments = $code['_concat'];
        array_walk($fragments, function (&$v) {
            if (is_array($v)) {
                $v = $this->processResultOfCode($v);
            }
        });
        $o = ConcatCodeSnippetElement::create()->setFragments($fragments);
        $varRef = $this->instantiationSnippet->registerConcatElement($o);
        return $varRef;
    }


    private function processCallsCode(array $calls, InstantiationCodeSnippetElement $parent)
    {
        foreach ($calls as $call) {
            if (array_key_exists('_method', $call)) {
                $method = $call['_method'];
                $o = CallMethodCodeSnippetElement::create()
                    ->setMethod($method)
                    ->setParent($parent)
                    ->setArgs($this->getResolvedArgs($call));
                $this->instantiationSnippet->registerCallMethodElement($o);
            }
            else {
                $this->syntaxError("Invalid call array, _method key not found");
            }
        }
    }

    private function parseArguments(array $args)
    {
        $ret = [];
        foreach ($args as $k => $v) {
            if (is_array($v)) {
                if (array_key_exists('_class', $v) || array_key_exists('_static', $v)) {
                    if (false !== $varRef = $this->parseInstantiationCode($v, true)) {
                        $ret[$k] = $varRef;
                    }
                    else {
                        $this->problem("The varRef couldn't be found with he given _class or _static code: " . VarTool::toString($v, ['details' => true]));
                    }
                }
                elseif (array_key_exists('_concat', $v)) {
                    if (false !== $varRef = $this->processConcatCode($v)) {
                        $ret[$k] = $varRef;
                    }
                    else {
                        $this->problem("The varRef couldn't be found with he given _resultOf code: " . VarTool::toString($v, ['details' => true]));
                    }
                }
                elseif (array_key_exists('_resultOf', $v)) {
                    if (false !== $varRef = $this->processResultOfCode($v)) {
                        $ret[$k] = $varRef;
                    }
                    else {
                        $this->problem("The varRef couldn't be found with he given _resultOf code: " . VarTool::toString($v, ['details' => true]));
                    }
                }
                else {
                    $ret[$k] = $this->parseArguments($v);
                }
            }
            else {

                if (is_string($v)) {
                    if ('@' === $v[0] && preg_match('!^@([a-zA-Z0-9_.]+)\+?$!', $v, $m)) {
                        $newInst = false;
                        if ('+' === substr($v, -1)) {
                            $newInst = true;
                        }
                        $v = ServiceRefSpecialArg::create()
                            ->setAddress($m[1])
                            ->setAskedForNewInstance($newInst);
                    }
                    elseif ('\@' === substr($v, 0, 2)) {
                        $v = substr($v, 1);
                    }
                }
                $ret[$k] = $v;
            }
        }
        return $ret;
    }


    private function getResolvedArgs(array $array)
    {
        $args = (array_key_exists('_args', $array)) ? $array['_args'] : [];
        if (is_array($args)) {
            $resolvedArgs = $this->parseArguments($args);
            return $resolvedArgs;
        }
        else {
            $this->syntaxError(sprintf("_args must be of type array, %s given", gettype($args)));
        }
        return [];
    }


    private function applyAdaptors(array &$biscotteArray)
    {
        array_walk_recursive($biscotteArray, function (&$v) {
            foreach ($this->adaptors as $adaptor) {
                /**
                 * @var BiscotteParserAdaptorInterface $adaptor
                 */
                $adaptor->adapt($v);
            }
        });
    }

    private function syntaxError($msg)
    {
        $msg = "Syntax error: " . $msg;
        throw new \RuntimeException($msg);
    }

    private function problem($msg)
    {
        $msg = "Problem: " . $msg;
        throw new \RuntimeException($msg);
    }
}
