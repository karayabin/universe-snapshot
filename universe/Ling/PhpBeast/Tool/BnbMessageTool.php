<?php


namespace Ling\PhpBeast\Tool;

/**
 * The BnbMessageTool class.
 */
class BnbMessageTool
{

    /**
     *
     * Prints an error result string.
     * See https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md#tests-result-string.
     *
     */
    public static function printErrorResultString()
    {
        echo '_BEAST_TEST_RESULTS:s=0;f=0;e=1;na=0;sk=0__';
    }
}