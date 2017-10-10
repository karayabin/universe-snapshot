<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Miscellaneous;

use BeeFramework\Bat\StringTool;
use BeeFramework\Component\String\StringIterator\StringIteratorInterface;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Container\OptionalKeyContainerExpressionDiscoverer;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Container\ValueContainerExpressionDiscoverer;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\HybridExpressionDiscoverer;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\SimpleQuoteExpressionDiscoverer;
use BeeFramework\Notation\String\StringParser\ExpressionDiscovererModel\ExpressionDiscovererModel;


/**
 * FunctionExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-16
 *
 * To emulate a function with a line of args in the style of php (almost).
 *
 * - arguments are separated by a comma
 * - we can use quotes to escape special symbols (comma, square brackets, the => operator)
 * - however, we can also write scalar directly if they don't contain the special symbols
 *              mentioned above (THAT IS DIFFERENT FROM PHP WHICH DOES NOT ALLOW STRINGS TO BE UNQUOTED FOR INSTANCE)
 * - we can use arrays with the square bracket notation, and recursively.
 * - quotedString use simple escaping mechanism (THIS IS DIFFERENT FROM PHP WHICH USES RECURSIVE BACKSLASH ESCAPING MECHANISM)
 * - the trailing comma on the last element of an array is not permitted (THIS IS DIFFERENT FROM PHP WHICH ALLOWS THAT TRAILING COMMA)
 *
 *
 * Example of possible syntax:
 *
 *          myFunction( hello world, bye )
 *          &my.service->method ( 1, a, b, ["hello"], [0 => pou, [a, b, [], c => "ap[p]le"]] )
 *
 *
 *
 * Implicit values for arguments are not allowed.
 *
 *
 */
class FunctionExpressionDiscoverer extends ValueContainerExpressionDiscoverer
{

    private $pattern;
    private $matches;
    private $isRecursive;
    private $prepared;
    
    

    public function __construct()
    {
        parent::__construct();
        $this->matches = [];
        $this->isRecursive = true;
        $this->prepared = false;
    }


    public static function create()
    {
        return new static();
    }

    public function getValue()
    {
        return [
            '_type' => StringTool::namespaceBaseName(get_called_class()),
            '_func' => $this->matches,
            '_params' => $this->value,
        ];
    }

    public function parse($string, $pos = 0)
    {
        $this->__prepare();
        $this->matches = [];
        $this->value = null;
        return parent::parse($string, $pos);
    }






    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * This method sets the pattern to match the beginning of the expression.
     * Usually, you want to match the part of the expression from the start to the
     * first opening parenthesis (the one indicating the beginning of the arguments) included.
     *
     * It's very important that your php pattern starts with the ^ symbol at the beginning
     * (match the beginning of the line symbol),
     * otherwise, it will just not handle nested expressions.
     *
     * For instance, this regex is ok:
     *
     *      ->setPattern('!^@([a-zA-Z0-9_]+):myService->do\(!');
     *
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
        return $this;
    }


    public function allowRecursion($bool)
    {
        $this->isRecursive = $bool;
        return $this;
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function isContainerBegin(StringIteratorInterface $it)
    {
        $string = $it->getString();
        $pos = $it->getPosition();
        $sub = mb_substr($string, $pos);
        if (preg_match($this->pattern, $sub, $matches)) {
            $this->setBeginSep($matches[0]);
            $this->matches = $matches;
            return true;
        }
        return false;
    }

    protected function doPrepare()
    {
        $arr = new OptionalKeyContainerExpressionDiscoverer();
        $arrModel = new ExpressionDiscovererModel($arr);
        $discoverers = [
            $arrModel,
            new SimpleQuoteExpressionDiscoverer(),
            new HybridExpressionDiscoverer(),
        ];

        if (true === $this->isRecursive) {
            $selfModel = new ExpressionDiscovererModel($this);
            array_unshift($discoverers, $selfModel);
        }


        $arr
            ->setBeginSep('[')
            ->setEndSep(']')
            ->setKeyValueSep('=>')
            ->setValueSep(',')
            ->setImplicitKeys(false)
            ->setImplicitValues(false)
            ->setImplicitEntries(false)
            ->setDiscoverers($discoverers)
            ->setKeyDiscoverers([
                new SimpleQuoteExpressionDiscoverer(),
                HybridExpressionDiscoverer::create(),
            ]);
        $this
            ->setEndSep(')')
            ->setValueSep(',')
            ->setImplicitValues(false)
            ->setDiscoverers($discoverers);
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
//    protected function moveCursorToFirstContainerElement(StringIteratorInterface $it){
//        parent::moveCursorToFirstContainerElement($it);
//    }
    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function __prepare()
    {
        if (false === $this->prepared) {
            $this->doPrepare();
            $this->prepared = true;
        }
    }
}
