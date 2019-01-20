<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Html\MarkDown\MarkDown;


/**
 * MarkDownTextConvertorUtil
 * @author Lingtalfi
 * 2014-08-29
 *
 */
class MarkDownTextConvertorUtil
{


    private $blockTags = [
        'p',
    ];

    private $startWithBlockTagsRegex = '';


    public function lineStartsWithBlockTag($line)
    {

    }

    public function lineIsValidParagraphStart($line)
    {

    }

    public function flattenBlocks()
    {

    }


    public function getBlockTagsAsRegexPart()
    {

        return $this->blockTags;
    }

}
