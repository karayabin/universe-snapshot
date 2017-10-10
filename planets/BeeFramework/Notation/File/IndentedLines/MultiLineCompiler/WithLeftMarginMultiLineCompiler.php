<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\IndentedLines\MultiLineCompiler;


/**
 * WithLeftMarginMultiLineCompiler
 * @author Lingtalfi
 * 2015-02-27
 *
 */
class WithLeftMarginMultiLineCompiler implements MultiLineCompilerInterface
{

    protected $leftMarginFactor;

    public function __construct($leftMarginFactor = 4)
    {
        $this->leftMarginFactor = $leftMarginFactor;
    }





    //------------------------------------------------------------------------------/
    // IMPLEMENTS MultiLineCompilerInterface
    //------------------------------------------------------------------------------/
    /**
     * @return string
     */
    public function getValue(array $lines, $nodeLevel)
    {
        $multiLineLevel = $nodeLevel + 1;
        $leftSpaces = $this->leftMarginFactor * $multiLineLevel;
        $sValue = implode(PHP_EOL, array_map(function ($item) use ($leftSpaces) {
            return preg_replace('!^ {0,' . $leftSpaces . '}!sm', '', $item);
        }, $lines));
        return $sValue;
    }
}
