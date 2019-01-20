<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLine;


/**
 * ImaginaryLine
 * @author Lingtalfi
 * 2015-05-08
 *
 */
class ImaginaryLine
{

    protected $buffer;
    protected $pos;
    protected $text;

    public function __construct($text = '')
    {
        $this->text = '';
        $this->buffer = '';
        $this->pos = 0;
        $this->insertAt($text);
    }

    
    public function reset()
    {
        $this->text = '';
        $this->buffer = '';
        $this->pos = 0;
    }

    public function backspace($pos = null, $n = 1)
    {

        $pos = $this->realPos($pos);
        $beginPos = null;
        if (null === $n) {
            $beginPos = 0;
        }
        else {
            $n = $this->getPositiveInt($n);
            $beginPos = $pos - $n;
            if ($beginPos < 0) {
                $beginPos = 0;
            }
        }

        $this->pos = $beginPos;

        $ret = mb_substr($this->text, $beginPos, $pos - $beginPos);
        if (false === $ret) {
            $ret = '';
        }


        $begin = mb_substr($this->text, 0, $beginPos);
        $end = mb_substr($this->text, $pos);
        $this->text = $begin . $end;
        return $ret;

    }

    public function deleteFrom($pos = null, $n = 1)
    {

        $pos = $this->realPos($pos);
        $this->pos = $pos;


        $len = mb_strlen($this->text);
        $endPos = null;
        if (null === $n) {
            $endPos = $len;
        }
        else {
            $n = $this->getPositiveInt($n);
            $endPos = $pos + $n;
            if ($endPos > $len) {
                $endPos = $len;
            }
        }

        $ret = mb_substr($this->text, $pos, $endPos - $pos);


        $begin = mb_substr($this->text, 0, $pos);
        $end = mb_substr($this->text, $endPos);
        if (false === $end) {
            $end = '';
        }
        $this->text = $begin . $end;
        return $ret;
    }

    public function insertAt($string, $pos = null, $moveCursor = true)
    {
        if (is_string($string)) {

            $pos = $this->realPos($pos);

            $begin = mb_substr($this->text, 0, $pos);
            $end = mb_substr($this->text, $pos);

            // if pos is exactly at the end of the string
            if (false === $end) {
                $end = '';
            }
            $this->text = $begin . $string . $end;

            if (true === $moveCursor) {
                $this->pos += mb_strlen($string);
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("string argument must be of type string, %s given", gettype($string)));
        }
    }

    public function cursorLeft($n = 1)
    {
        $this->pos = $this->realPos($this->pos - $n);
    }

    public function cursorRight($n = 1)
    {
        $this->pos = $this->realPos($this->pos + $n);
    }

    public function cursorAtPos($pos = null)
    {
        $this->pos = $this->realPos($pos);
    }

    public function getCursorPos()
    {
        return $this->pos;
    }

    public function getText()
    {
        return $this->text;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function realPos($pos)
    {
        if (null === $pos) {
            return $this->pos;
        }
        if ($pos < 0) {
            $pos = 0;
        }
        else {
            $len = mb_strlen($this->text);
            if ($pos > $len) {
                $pos = $len;
            }
        }
        return $pos;
    }

    private function getPositiveInt($n)
    {
        $n = (int)$n;
        if ($n < 0) {
            throw new \InvalidArgumentException("n must be a positive integer");
        }
        return $n;
    }
}
