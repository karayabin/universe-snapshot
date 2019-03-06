<?php


namespace Ling\CliTools\Formatter;


/**
 * The DumbFormatter class.
 *
 * This formatter does nothing special, it just returns the string that you send to it,
 * without doing any formatting.
 *
 *
 */
class DumbFormatter implements FormatterInterface
{

    /**
     * @implementation
     */
    public function format(string $expression): string
    {
        return $expression;
    }
}