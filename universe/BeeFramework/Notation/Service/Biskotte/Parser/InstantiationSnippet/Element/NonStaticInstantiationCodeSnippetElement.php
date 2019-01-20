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
 * NonStaticInstantiationCodeSnippetElement
 * @author Lingtalfi
 * 2015-05-26
 *
 */
class NonStaticInstantiationCodeSnippetElement extends InstantiationCodeSnippetElement
{

    private $className;


    public function setClassName($className)
    {
        $this->className = $className;
        return $this;
    }

    public function getClassName()
    {
        return $this->className;
    }
    
    


}
