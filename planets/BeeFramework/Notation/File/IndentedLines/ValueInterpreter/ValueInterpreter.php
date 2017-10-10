<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\IndentedLines\ValueInterpreter;

use BeeFramework\Bat\StringTool;


/**
 * ValueInterpreter
 * @author Lingtalfi
 * 2015-02-27
 *
 */
class ValueInterpreter implements ValueInterpreterInterface
{


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ValueInterpreterInterface
    //------------------------------------------------------------------------------/
    /**
     * @return mixed
     */
    public function getValue($line)
    {
        return StringTool::autoCast($line);
    }

}
