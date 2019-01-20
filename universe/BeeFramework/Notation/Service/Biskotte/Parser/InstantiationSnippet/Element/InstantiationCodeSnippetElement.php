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
 * InstantiationCodeSnippetElement
 * @author Lingtalfi
 * 2015-05-26
 *
 */
abstract class InstantiationCodeSnippetElement extends CodeSnippetElement
{

    private $args;
    private $isOnTheFly;

    public function __construct()
    {
        parent::__construct();
        $this->args = [];
        $this->isOnTheFly = false;
    }


    public function setArgs(array $args)
    {
        $this->args = $args;
        return $this;
    }

    public function getArgs()
    {
        return $this->args;
    }


    public function setIsOnTheFly($isOnTheFly)
    {
        $this->isOnTheFly = $isOnTheFly;
        return $this;
    }

    public function getIsOnTheFly()
    {
        return $this->isOnTheFly;
    }


}
