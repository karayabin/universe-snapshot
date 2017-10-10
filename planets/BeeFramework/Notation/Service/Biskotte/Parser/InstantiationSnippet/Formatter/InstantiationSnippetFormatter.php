<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Formatter;

use BeeFramework\Component\Arrays\ArrayExportUtil\ArrayExportUtil;
use BeeFramework\Notation\Service\Biskotte\Exception\BiskotteException;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\CallMethodCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\ConcatCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\InstantiationCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\NonStaticInstantiationCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\ResultOfCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\StaticInstantiationCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\InstantiationSnippet;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\SpecialArg\ParameterRefSpecialArg;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\SpecialArg\ServiceRefSpecialArg;

use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\SpecialArg\VarRefSpecialArg;


/**
 * InstantiationSnippetFormatter
 * @author Lingtalfi
 * 2015-05-26
 *
 */
class InstantiationSnippetFormatter implements InstantiationSnippetFormatterInterface
{

    private $serviceGetter;
    private $arrayExport;

    public function __construct()
    {
        $this->serviceGetter = function ($address, $newInstance = false) {
            if ('container' === $address) {
                return '$this';
            }
            $sNewInst = (false === $newInstance) ? 'false' : 'true';
            return '$this->getService("' . $address . '", null, ' . $sNewInst . ')';
        };
        $this->arrayExport = ArrayExportUtil::create()
            ->setValueFormatter(function ($val) {
                if ($val instanceof VarRefSpecialArg) {
                    return '$' . $val->getVarRefName();
                }
                elseif ($val instanceof ServiceRefSpecialArg) {
                    return $this->toServiceGetter($val->getAddress(), $val->getAskedForNewInstance());
                }
                return var_export($val, true);
            });
    }

    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS InstantiationSnippetFormatterInterface
    //------------------------------------------------------------------------------/
    public function getCode(InstantiationSnippet $snippet)
    {
        $s = '';


        $beforeEls = $snippet->getReferencesElements();
        $refCalls = $snippet->getReferencesCallsElements();
        $usingRefsEls = $snippet->getUsingReferencesElements();
        $afterEls = $snippet->getInstantiationCallsElements();
        $instantiationEl = $snippet->getInstantiationElement();

        if ($beforeEls) {
            foreach ($beforeEls as $el) {
                if ($el instanceof ResultOfCodeSnippetElement) {

                    $s .= '$' . $el->getVarName() .
                        ' = ' .
                        $this->getResultOfCode($el);
                }
                elseif ($el instanceof InstantiationCodeSnippetElement) {
                    $s .= $this->getInstantiationCode($el);
                }
                else {
                    $this->error("Unknown before element: " . get_class($el));
                }
            }
        }


        // referenced elements call code
        if ($refCalls) {
            $s .= $this->getCallsCode($refCalls);
        }

        // elements using referenced elements
        if ($usingRefsEls) {
            $s .= $this->sep();
            foreach ($usingRefsEls as $el) {
                if ($el instanceof ConcatCodeSnippetElement) {

                    $frags = $el->getFragments();
                    array_walk($frags, function (&$v) {
                        if ($v instanceof VarRefSpecialArg) {
                            $v = '$' . $v->getVarRefName();
                        }
                        else { // is string
                            $v = var_export($v, true);
                        }
                    });

                    $s .= '$' . $el->getVarName() .
                        ' = ' .
                        implode(' . ' . PHP_EOL, $frags) .
                        ';' . PHP_EOL;

                }
                elseif ($el instanceof InstantiationCodeSnippetElement) {
                    $s .= $this->getInstantiationCode($el);
                }
                else {
                    $this->error("Unknown before element: " . get_class($el));
                }
            }
        }


        // instantiation code
        if ('' !== $s) {
            $s .= $this->sep();
        }
        $s .= $this->getInstantiationCode($instantiationEl);

        if ($afterEls) {
            $s .= $this->getCallsCode($afterEls);
        }


        $s .= $this->line($snippet->getReturnStatement());

        return $s;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @param callable $serviceGetter
     *                      string  callable ( serviceAddress )
     *                          Returns the string that calls the service, from inside the container.
     *
     * @return $this
     */
    public function setServiceGetter(callable $serviceGetter)
    {
        $this->serviceGetter = $serviceGetter;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function line($m)
    {
        return $m . PHP_EOL;
    }

    private function sep()
    {
        return $this->line("// -----");
    }

    private function getResultOfCode(ResultOfCodeSnippetElement $el)
    {
        $s = '';
        $intro = '';
        $rof = $el->getResultOfString();
        if (false !== strpos($rof, '::')) {
            $intro .= $rof;
        }
        else {
            $p = explode('->', $rof);
            if (2 === count($p)) {
                $address = substr($p[0], 1);
                $method = $p[1];
                $intro .= $this->toServiceGetter($address) . '->' . $method;
            }
            else {
                $this->error("Invalid resultOf service declaration, missing the -> symbol");
            }
        }
        $intro .= ' (';
        $s .= $this->addArgsAndClose($el->getArgs(), $intro);
        return $s;
    }

    private function getCallsCode(array $els)
    {
        $s = '';
        $s .= $this->sep();
        foreach ($els as $el) {
            if ($el instanceof CallMethodCodeSnippetElement) {

                $intro = '$' . $el->getParent()->getVarName() .
                    '->' .
                    $el->getMethod();
                $intro .= ' (';
                $s .= $this->addArgsAndClose($el->getArgs(), $intro);
            }
            else {
                $this->error("Unknown after element: " . get_class($el));
            }
        }
        return $s;
    }

    private function getInstantiationCode(InstantiationCodeSnippetElement $el)
    {
        $s = '';
        $intro = '$' . $el->getVarName() .
            ' = ';
        if ($el instanceof NonStaticInstantiationCodeSnippetElement) {
            $intro .=
                'new ' .
                $el->getClassName();
        }
        elseif ($el instanceof StaticInstantiationCodeSnippetElement) {
            $intro .= $el->getStaticMethodCall();
        }
        else {
            $this->error("Unknown type of before InstantiationCodeSnippetElement");
        }
        $intro .= ' (';
        $s .= $this->addArgsAndClose($el->getArgs(), $intro);
        return $s;
    }

    private function error($m)
    {
        throw new BiskotteException($m);
    }

    private function toServiceGetter($address, $newInstance = false)
    {
        return call_user_func($this->serviceGetter, $address, $newInstance);
    }

    private function argsToLines(array $args)
    {
        $s = $this->arrayExport->arrayExport($args, true, 'stackedPhpFunctionArguments');
        return $s;
    }

    private function addArgsAndClose(array $args, $intro)
    {

        $s = '';
        if ($args) {
            $s .= $this->line($intro);
            $s .= $this->argsToLines($args);
            $s .= $this->line(');');
        }
        else {
            $intro .= ');';
            $s .= $this->line($intro);
        }
        return $s;
    }
}
