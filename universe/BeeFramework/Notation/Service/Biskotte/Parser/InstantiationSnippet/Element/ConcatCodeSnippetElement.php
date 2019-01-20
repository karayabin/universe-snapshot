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
 * ConcatCodeSnippetElement
 * @author Lingtalfi
 * 2015-06-05
 *
 */
class ConcatCodeSnippetElement extends CodeSnippetElement
{
    private $fragments;

    public function __construct()
    {
        parent::__construct();
        $this->fragments = [];
    }

    public function setFragments(array $fragments)
    {
        $this->fragments = $fragments;
        return $this;
    }

    public function getFragments()
    {
        return $this->fragments;
    }


}
