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
 * ResultOfCodeSnippetElement
 * @author Lingtalfi
 * 2015-05-26
 *
 */
class ResultOfCodeSnippetElement extends CodeSnippetElement
{
    private $args;
    private $resultOfString;

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

    public function setResultOfString($resultOfString)
    {
        $this->resultOfString = $resultOfString;
        return $this;
    }

    public function getResultOfString()
    {
        return $this->resultOfString;
    }
    

    public function getArgs()
    {
        return $this->args;
    }
    
    
    
}
