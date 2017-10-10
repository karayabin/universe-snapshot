<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\IndentedLines\MultiLineDelimiter;


/**
 * SingleCharMultiLineDelimiter
 * @author Lingtalfi
 * 2015-02-27
 *
 */
class SingleCharMultiLineDelimiter implements MultiLineDelimiterInterface
{

    protected $startChar;
    protected $endChar;

    public function __construct(array $options = [])
    {
        $options = array_replace([
            'startChar' => '<',
            'endChar' => '>',
        ], $options);
        $this->startChar = $options['startChar'];
        $this->endChar = $options['endChar'];
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS MultiLineDetectorInterface
    //------------------------------------------------------------------------------/
    public function isBegin($line)
    {
        $lastChar = substr(rtrim($line), -1);
        return ($this->startChar === $lastChar);
    }

    public function isEnd($line)
    {
        return ($this->endChar === trim($line));
    }

}
