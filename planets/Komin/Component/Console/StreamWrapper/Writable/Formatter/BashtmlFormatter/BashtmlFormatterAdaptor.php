<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\StreamWrapper\Writable\Formatter\BashtmlFormatter;


/**
 * BashtmlFormatterAdaptor
 *
 * We implement combined styles: for instance, we can write:
 *
 * - <blue:bgRed>My text</blue:bgRed>
 *
 * instead of
 *
 * - <blue><bgRed>My text</bgRed></blue>
 *
 * This one simply works with format codes:
 *
 * // http://misc.flogisoft.com/bash/tip_colors_and_formatting?&#comment_8210c4fe2c90858ae913fd908184a2b2
 *
 *
 * FormatCodes: (might/might not work depending on your terminal, most codes work however)
 *
 * Combining codes: simply separate them with semi-colon
 *
 *
 * Formatting:
 * 1: Bold
 * 2: Dim
 * 4: Underlined
 * 5: Blink
 * 7: Reverse
 * 8: Hidden
 *
 * Colors:
 * Foreground:
 * 39: Default foreground color
 * 30: Black
 * 31: Red
 * 32: Green
 * 33: Yellow
 * 34: Blue
 * 35: Magenta
 * 36: Cyan
 * 37: Light gray
 * 90: Dark gray
 * 91: Light red
 * 92: Light green
 * 93: Light yellow
 * 94: Light blue
 * 95: Light magenta
 * 96: Light cyan
 * 97: White
 *
 * Background:
 * 49: Default background color
 * 40: Black
 * 41: Red
 * 42: Green
 * 43: Yellow
 * 44: Blue
 * 45: Magenta
 * 46: Cyan
 * 47: Light gray
 * 100: Dark gray
 * 101: Light red
 * 102: Light green
 * 103: Light yellow
 * 104: Light blue
 * 105: Light magenta
 * 106: Light cyan
 * 107: White
 *
 *
 *
 *
 * @author Lingtalfi
 *
 *
 */
class BashtmlFormatterAdaptor
{

    // alias => formatCode
    protected $formatCodes;
    // useful for testing
    private $escapeSequence;

    public function __construct()
    {
        $this->formatCodes = [
            'bold' => '1',
            'dim' => '2',
            'underlined' => '4',
            'blink' => '5',
            'reverse' => '7',
            'hidden' => '8',
            'default' => '39',
            'black' => '30',
            'red' => '31',
            'green' => '32',
            'yellow' => '33',
            'blue' => '34',
            'magenta' => '35',
            'cyan' => '36',
            'lightGray' => '37',
            'darkGray' => '90',
            'lightRed' => '91',
            'lightGreen' => '92',
            'lightYellow' => '93',
            'lightBlue' => '94',
            'lightMagenta' => '95',
            'lightCyan' => '96',
            'white' => '97',
            'bgDefault' => '49',
            'bgBlack' => '40',
            'bgRed' => '41',
            'bgGreen' => '42',
            'bgYellow' => '43',
            'bgBlue' => '44',
            'bgMagenta' => '45',
            'bgCyan' => '46',
            'bgLightGray' => '47',
            'bgDarkGray' => '100',
            'bgLightRed' => '101',
            'bgLightGreen' => '102',
            'bgLightYellow' => '103',
            'bgLightBlue' => '104',
            'bgLightMagenta' => '105',
            'bgLightCyan' => '106',
            'bgWhite' => '107',
        ];
        $this->escapeSequence = "\033";
    }


    public function getStartTag($name, array $parents = [])
    {
        if (false === $this->checkCode($name)) {
            return false;
        }
        $parents[] = $name;
        return $this->getFormatExpression($parents);
    }

    public function getStopTag($name, array $parents = [])
    {
        if (false === $this->checkCode($name)) {
            return false;
        }
        $ret = $this->escapeSequence . "[0m";
        $ret .= $this->getFormatExpression($parents);
        return $ret;
    }


    public function setEscapeSequence($escapeSequence)
    {
        $this->escapeSequence = $escapeSequence;
    }


    //------------------------------------------------------------------------------/

    //
    //------------------------------------------------------------------------------/
    private function getFormatExpression(array $codes)
    {
        $formats = [];
        foreach ($codes as $alias) {
            if (false !== strpos($alias, ':')) {
                $p = explode(':', $alias);
                foreach ($p as $_alias) {
                    if (array_key_exists($_alias, $this->formatCodes)) {
                        $formats[] = $this->formatCodes[$_alias];
                    }
                }
            }
            else {
                if (array_key_exists($alias, $this->formatCodes)) {
                    $formats[] = $this->formatCodes[$alias];
                }
            }
        }
        if ($formats) {
            return $this->escapeSequence . "[" . implode(';', $formats) . "m";
        }
        return '';
    }

    private function checkCode($code)
    {
        if (false !== strpos($code, ':')) {
            $p = explode(':', $code);
            foreach ($p as $_code) {
                if (!array_key_exists($_code, $this->formatCodes)) {
                    return false;
                }
            }
        }
        else {
            return (array_key_exists($code, $this->formatCodes));
        }
        return true;
    }

}
