<?php


namespace BabyYaml\Reader\MiniMl\Formatter;


/**
 * StripMiniMlFormatter
 * @author Lingtalfi
 * 2015-05-21
 *
 * This formatter actually removes the miniMl markup.
 * The resulting string is a human readable message.
 *
 *
 *
 */
class StripMiniMlFormatter implements MiniMlFormatterInterface
{

    public function format($string)
    {
        return str_replace(["\n", '\n'], PHP_EOL, preg_replace('!</?[a-zA-Z0-9_:]+>!', '', $string));
    }
}
