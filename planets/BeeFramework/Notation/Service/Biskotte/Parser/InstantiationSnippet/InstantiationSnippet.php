<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet;

use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\CallMethodCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\ConcatCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\InstantiationCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element\ResultOfCodeSnippetElement;
use BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\SpecialArg\VarRefSpecialArg;


/**
 * InstantiationSnippet
 * @author Lingtalfi
 * 2015-05-26
 *
 */
class InstantiationSnippet
{

    private $referencesElements;
    private $referencesCallsElements;
    private $usingReferencesElements;
    private $instantiationElement;
    private $instantiationCallsElements;
    ///
    private $concatCpt;
    private $resultOfCpt;
    private $onTheFlyCpt;

    public function __construct()
    {
        $this->referencesElements = [];
        $this->referencesCallsElements = [];
        $this->usingReferencesElements = [];
        $this->instantiationCallsElements = [];

        $this->concatCpt = 0;
        $this->resultOfCpt = 0;
        $this->onTheFlyCpt = 0;
    }

    public static function create()
    {
        return new static();
    }

    public function getReturnStatement()
    {
        return 'return $o;';
    }

    public function registerInstantiationElement(InstantiationCodeSnippetElement $element)
    {
        $ret = null;
        if (false === $element->getIsOnTheFly()) {
            $this->instantiationElement = $element;
            $varName = 'o';
            $ret = VarRefSpecialArg::create()->setVarRefName($varName);
        }
        else {
            $this->referencesElements[] = $element;
            $varName = 'onTheFly' . $this->onTheFlyCpt++;
            $ret = VarRefSpecialArg::create()->setVarRefName($varName);
        }
        $element->setVarName($varName);
        return $ret;
    }

    /**
     * @return VarRefSpecialArg
     */
    public function registerResultOfElement(ResultOfCodeSnippetElement $element)
    {
        $this->referencesElements[] = $element;
        $ret = 'resultOf' . $this->resultOfCpt++;
        $element->setVarName($ret);
        $ret = VarRefSpecialArg::create()->setVarRefName($ret);
        return $ret;
    }

    /**
     * @return VarRefSpecialArg
     */
    public function registerConcatElement(ConcatCodeSnippetElement $element)
    {
        $this->usingReferencesElements[] = $element;
        $ret = 'concat' . $this->concatCpt++;
        $element->setVarName($ret);
        $ret = VarRefSpecialArg::create()->setVarRefName($ret);
        return $ret;
    }

    public function registerCallMethodElement(CallMethodCodeSnippetElement $element)
    {
        if ($element->getParent()->getIsOnTheFly()) {
            $this->referencesCallsElements[] = $element;
        }
        else {
            $this->instantiationCallsElements[] = $element;
        }
        return $this;
    }


    public function getInstantiationCallsElements()
    {
        return $this->instantiationCallsElements;
    }

    public function getReferencesCallsElements()
    {
        return $this->referencesCallsElements;
    }


    public function getReferencesElements()
    {
        return $this->referencesElements;
    }

    public function getUsingReferencesElements()
    {
        return $this->usingReferencesElements;
    }

    /**
     * @return InstantiationCodeSnippetElement
     */
    public function getInstantiationElement()
    {
        return $this->instantiationElement;
    }


}
