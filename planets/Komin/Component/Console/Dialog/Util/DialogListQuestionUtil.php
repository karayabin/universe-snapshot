<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\Dialog\Util;


/**
 * DialogListQuestionUtil
 * @author Lingtalfi
 * 2015-05-08
 *
 *
 * This object helps generating a question from a list of items (php array).
 *
 *
 * The generated question has the following stucture:
 *
 *      - head
 *      - list
 *      - tail
 *
 * For instance:
 *
 *      Here is a list of available fruits:
 *              - 0: apple
 *              - 1: banana
 *              - ...
 *      Which fruit do you want?
 *
 *
 * The list items are generated using a format string.
 * This format string uses at most two tags: {key} and {value}.
 * The default format is:
 *          - {key}: {value}
 *
 * There is an itemSeparator char, which is interspersed between every item.
 * The default itemSeparator is the system carriage return (PHP_EOL),
 * but one can set it to the comma (for instance) to have a comma separated list of items.
 *
 *
 *
 *
 */
class DialogListQuestionUtil
{

    private $head;
    private $tail;
    private $list;
    private $format;
    private $separatorChar;

    public function __construct()
    {
        $this->head = '';
        $this->tail = '';
        $this->list = [];
        $this->format = '- {key}: {value}';
        $this->separatorChar = PHP_EOL;
    }


    public function createQuestion()
    {
        $s = '';
        $s .= $this->head;
        $items = [];
        foreach ($this->list as $k => $v) {
            $items[] = str_replace([
                '{key}',
                '{value}',
            ], [
                $k,
                $v,
            ], $this->format);
        }
        $s .= implode($this->separatorChar, $items);
        $s .= $this->tail;
        return $s;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }

    public function setSeparatorChar($separatorChar)
    {
        $this->separatorChar = $separatorChar;
        return $this;
    }

    public function setTail($tail)
    {
        $this->tail = $tail;
        return $this;
    }

    public function setHead($head)
    {
        $this->head = $head;
        return $this;
    }

    public function setList(array $list)
    {
        $this->list = $list;
        return $this;
    }


}
