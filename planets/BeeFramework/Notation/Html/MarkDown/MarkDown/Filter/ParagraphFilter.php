<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Html\MarkDown\MarkDown\Filter;


/**
 * ParagraphFilter
 * @author Lingtalfi
 * 2014-08-29
 *
 */
class ParagraphFilter extends BaseFilter
{


    //------------------------------------------------------------------------------/
    // IMPLEMENTS TextConvertorFilterInterface
    //------------------------------------------------------------------------------/
    public function filter($string)
    {
        $lines = explode(PHP_EOL, $string);

        return implode(PHP_EOL, $lines);
    }


}
