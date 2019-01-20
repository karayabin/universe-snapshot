<?php

namespace BullSheet\Tool;

/*
 * LingTalfi 2016-02-11
 */
class BankDataGeneratorTool
{


    /**
     * Generate an invalid rib, but with the good format,
     * like:
     *
     * 18206 - 00210 - 5487b667002 - 17
     */
    public static function rib()
    {
        return
            CharGeneratorTool::numbers(5) .
            " - " . CharGeneratorTool::numbers(5) .
            " - " . CharGeneratorTool::alphaNumericChars(11) .
            " - " . CharGeneratorTool::numbers(2);
    }
}
