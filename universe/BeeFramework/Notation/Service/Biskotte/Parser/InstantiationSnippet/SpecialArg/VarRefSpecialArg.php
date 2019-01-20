<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\SpecialArg;


/**
 * VarRefSpecialArg
 * @author Lingtalfi
 * 2015-05-27
 *
 */
class VarRefSpecialArg extends SpecialArg
{
    private $varRefName;

    public function getVarRefName()
    {
        return $this->varRefName;
    }

    public function setVarRefName($varRefName)
    {
        $this->varRefName = $varRefName;
        return $this;
    }

    
}
