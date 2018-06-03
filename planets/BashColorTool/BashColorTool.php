<?php


namespace BashColorTool;


class BashColorTool
{

    // alias => formatCode
    protected static $foregroundFormatCodes = [
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
    ];
    protected static $backgroundFormatCodes = [
        'default' => '49',
        'black' => '40',
        'red' => '41',
        'green' => '42',
        'yellow' => '43',
        'blue' => '44',
        'magenta' => '45',
        'cyan' => '46',
        'lightGray' => '47',
        'darkGray' => '100',
        'lightRed' => '101',
        'lightGreen' => '102',
        'lightYellow' => '103',
        'lightBlue' => '104',
        'lightMagenta' => '105',
        'lightCyan' => '106',
        'white' => '107',
    ];

    private static $escapeSequence = "\033";


    //------------------------------------------------------------------------------/

    //
    //------------------------------------------------------------------------------/
    public static function output($message, $foreground = null, $background = null, $lineReturn = true)
    {
        $formats = [];
        if ($foreground && array_key_exists($foreground, self::$foregroundFormatCodes)) {
            $formats[] = self::$foregroundFormatCodes[$foreground];
        }
        if ($background && array_key_exists($background, self::$backgroundFormatCodes)) {
            $formats[] = self::$backgroundFormatCodes[$background];
        }
        echo self::$escapeSequence . "[" . implode(';', $formats) . "m" . $message . self::$escapeSequence . "[0m";
        if ($lineReturn) {
            echo PHP_EOL;
        }
    }

    public static function error($msg, $lineReturn = true)
    {
        self::output($msg, "red", null, $lineReturn);
    }

    public static function warning($msg, $lineReturn = true)
    {
        self::output($msg, "yellow", null, $lineReturn);
    }

    public static function success($msg, $lineReturn = true)
    {
        self::output($msg, "green", null, $lineReturn);
    }

    public static function info($msg, $lineReturn = true)
    {
        self::output($msg, "blue", null, $lineReturn);
    }


}