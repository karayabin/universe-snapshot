<?php


namespace Ling\CliTools\Formatter;


/**
 * The FormatterInterface interface.
 *
 * A formatter is used to interpret custom notations: it parses a usually high-level notation and renders it as a generally more low-level string.
 *
 *
 */
interface FormatterInterface
{

    /**
     * Parses the given $expression and returns its formatted/interpreted version.
     *
     * @param string $expression
     * @return string
     */
    public function format(string $expression): string;
}