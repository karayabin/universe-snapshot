<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\String\StringIterator;


/**
 * StringIterator
 * @author Lingtalfi
 * 2015-05-12
 *
 */
class StringIterator implements StringIteratorInterface
{

    private $pos;
    private $string;
    private $len;

    public function __construct($string = '')
    {
        $this->pos = 0;
        $this->setString($string);
    }



    //------------------------------------------------------------------------------/
    // IMPLEMENTS StringIteratorInterface
    //------------------------------------------------------------------------------/
    /**
     * @return bool, true while there is at least one char after the current position,
     *                  or false when the cursor is either at the last position
     *                  or out of bounds.
     *
     */
    public function isValid()
    {
        return ($this->pos >= 0 && $this->pos < $this->len);
    }

    /**
     * moves the cursor to the next position
     */
    public function next()
    {
        $this->pos++;
    }

    public function setPosition($pos)
    {
        $this->pos = $pos;
        return $this;
    }

    public function getPosition()
    {
        return $this->pos;
    }

    public function setString($s)
    {
        $this->string = $s;
        $this->len = mb_strlen($this->string);
        return $this;
    }

    public function getString()
    {
        return $this->string;
    }

    /**
     * @return string, the current char,
     *              or an empty string if the position is not valid
     */
    public function current()
    {
        return (string)mb_substr($this->string, $this->pos, 1);
    }


}
