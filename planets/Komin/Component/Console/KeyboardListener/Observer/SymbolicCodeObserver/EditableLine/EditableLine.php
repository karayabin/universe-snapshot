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

use Komin\Component\Console\Tool\TerminalCodesTool;
use Komin\Component\Console\Tool\TerminalInfoTool;


/**
 * EditableLine
 * @author Lingtalfi
 * 2015-05-08
 *
 */
class EditableLine
{

    private $startX;
    private $startY;
    private $line;
    private $prompt;
    private $promptLen;

    public function __construct()
    {
        $this->line = new ImaginaryLine();
        $this->prompt = '';
        $this->promptLen = 0;
    }

    public function getText()
    {
        return $this->line->getText();
    }

    public function setPrompt($string)
    {
        $this->prompt = $string;
        $this->promptLen = mb_strlen($this->prompt);
        return $this;
    }

    public function hasBeginPosition()
    {
        return (null !== $this->startX);
    }

    public function refreshBeginPosition()
    {
        // memorize cursor position, where the prompt should start
        list($x, $y) = TerminalInfoTool::getCurrentPosition();
        $this->startX = $x;
        $this->startY = $y;
        return $this;
    }

    public function insertAt($string, $pos = null, $moveCursor = true)
    {
        $this->line->insertAt($string, $pos, $moveCursor);
        return $this;
    }

    public function cursorAtPos($pos = null)
    {
        $this->line->cursorAtPos($pos);
        return $this;
    }

    public function cursorLeft($n = 1)
    {
        $this->line->cursorLeft($n);
        return $this;
    }

    public function cursorRight($n = 1)
    {
        $this->line->cursorRight($n);
        return $this;
    }

    public function deleteFrom($pos = null, $n = 1)
    {
        $this->line->deleteFrom($pos, $n);
        return $this;
    }

    public function backspace($pos = null, $n = 1)
    {
        $this->line->backspace($pos, $n);
        return $this;
    }

    public function reset()
    {
        $this->line->reset();
        return $this;
    }

    public function refreshLine()
    {


        /**
         * Note: this implementation has the following problems (that I'm aware of):
         *
         *  - when resizing the screen (terminal) size, then typing a new char,
         *          the displaying of the text might be doubled.
         *          Resize it again and press a new char, it might return to a single version.
         *          So I guess it's the terminal that handles this in its own way.
         *          Fortunately it doesn't affect the true content of the line, it's just a display problem.
         *
         */

        $w = TerminalInfoTool::getTerminalWidth();
        $h = TerminalInfoTool::getTerminalHeight();
        $content = $this->line->getText();
        $cLen = mb_strlen($content);


        $s = '';

        $s .= TerminalCodesTool::cursorPosition($this->startX, $this->startY, true);
        $s .= TerminalCodesTool::clearScreenFromCursorDown(true);
        $s .= TerminalCodesTool::cursorPosition($this->startX, $this->startY, true);

        $s .= $this->prompt;
        $s .= $content;

        $cPos = $this->line->getCursorPos();

        /**
         * Adapting a long line which wraps on multiple line.
         * Remember: the top left position in a bash terminal is 1,1.
         */
        $curX = ($cPos + $this->startX + $this->promptLen) % $w;
        if (0 === $curX) {
            $curX = $w;
        }


        $nbLines = ceil(($this->startX - 1 + $this->promptLen + $cLen) / $w);
        /**
         * Here, we early? fix the case where the number of visual lines would go beyond the terminal's height.
         */
        if (($this->startY + $nbLines - 1) > $h) {
            // offset is actually the number of extra lines
            $offset = ($this->startY + $nbLines - 1) - $h;
            $this->startY -= $offset;
        }
        $curY = $this->startY + ceil(($cPos + $this->startX + $this->promptLen) / $w) - 1;


        /**
         * Handling the case where the user just typed the last possible char on the terminal (bottom right),
         * then the cursor would normally be at pos 1 of a new line (that we emulate with PHP_EOL)
         */
        if ($curY > $h) {
            $offset = $curY - $h;
            $curY = $h;
            $s .= PHP_EOL;
            $this->startY -= $offset;
        }
        $s .= TerminalCodesTool::cursorPosition($curX, $curY, true);
        echo $s;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function dump()
    {
        list($w, $h) = $this->getTerminalDimensions();
        $list = [
            'startX' => $this->startX,
            'startY' => $this->startY,
            'w' => $w,
            'h' => $h,
            'line' => $this->line->getText(),
            'pos' => $this->line->getCursorPos(),
        ];
        return implode('; ', $list) . PHP_EOL;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getTerminalDimensions()
    {
        return [
            TerminalInfoTool::getTerminalWidth(),
            TerminalInfoTool::getTerminalHeight(),
        ];
    }

  


}
