<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\Element;


/**
 * CallMethodCodeSnippetElement
 * @author Lingtalfi
 * 2015-05-26
 *
 */
class CallMethodCodeSnippetElement extends CodeSnippetElement
{

    private $method;
    private $args;
    /**
     * @var InstantiationCodeSnippetElement
     */
    private $parent;

    public function __construct()
    {
        parent::__construct();
        $this->args = [];
    }

    public function setArgs(array $args)
    {
        $this->args = $args;
        return $this;
    }

    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getArgs()
    {
        return $this->args;
    }


    public function setParent(InstantiationCodeSnippetElement $parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return InstantiationCodeSnippetElement
     */
    public function getParent()
    {
        return $this->parent;
    }


}
