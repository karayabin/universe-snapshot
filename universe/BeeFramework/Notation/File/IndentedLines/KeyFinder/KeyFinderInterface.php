<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\IndentedLines\KeyFinder;


/**
 * KeyFinderInterface
 * @author Lingtalfi
 * 2015-02-27
 *
 */
interface KeyFinderInterface
{
    /**
     *
     *
     * A valid key is defined as follow:
     *
     *      - it has one of the two following formats:
     *              - defaultFormat: <key> <kvSep>
     *              - phpFormat: <autoIndexSymbol>
     *
     *      - a key in defaultFormat can be protected with quotes
     *      - a key in defaultFormat starting with a quote IS ALWAYS a quoted key
     *
     * @param $line , string starting with a non blank char
     *
     * @return false|null|string:
     *
     *          Let p be the portion of line starting at pos.
     *          Returns false if a valid key couldn't be found in p.
     *          Otherwise, it's a success:
     *                  - $pos is updated and indicates the position just after kvSep (defaultFormat) or autoIndexSymbol (phpFormat)
     *                  - one of the following values is returned:
     *                          - null: indicates that the php's native indexation mechanism should be used
     *                          - string: the key
     *
     */
    public function getKey($line, &$pos);
}
