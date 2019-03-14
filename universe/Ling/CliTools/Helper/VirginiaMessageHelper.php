<?php


namespace Ling\CliTools\Helper;


use Ling\CliTools\Output\OutputInterface;

/**
 * The VirginiaMessageHelper class.
 * Contains message formatting helpers.
 *
 *
 * It basically puts a colored label at the beginning of each line, this improving readability.
 * See the examples section for more details.
 *
 *
 * This helper is used by @page(the Uni2 planet).
 *
 *
 *
 *
 */
class VirginiaMessageHelper
{


    /**
     * Writes a success message to the output.
     *
     *
     * @param string|array $message
     * @param OutputInterface $output
     * @param int $indent
     */
    public static function success($message, OutputInterface $output, int $indent = 0)
    {
        if (false === is_array($message)) {
            $message = [$message];
        }
        $iString = ($indent > 0) ? self::i($indent) : "";
        foreach ($message as $msg) {
            $output->write('<white:bgGreen> SUC </white:bgGreen> ' . $iString . $msg);
        }
    }

    /**
     * Writes an info message to the output.
     *
     *
     * @param string|array $message
     * @param OutputInterface $output
     * @param int $indent
     */
    public static function info($message, OutputInterface $output, int $indent = 0)
    {
        if (false === is_array($message)) {
            $message = [$message];
        }
        $iString = ($indent > 0) ? self::i($indent) : "";
        foreach ($message as $msg) {
            $output->write('<white:bgDarkGray> INF </white:bgDarkGray> ' . $iString . $msg);
        }
    }


    /**
     * Writes a command message to the output.
     *
     *
     * @param string|array $message
     * @param OutputInterface $output
     * @param int $indent
     */
    public static function command($message, OutputInterface $output, int $indent = 0)
    {
        if (false === is_array($message)) {
            $message = [$message];
        }
        $iString = ($indent > 0) ? self::i($indent) : "";
        foreach ($message as $msg) {
            $output->write('<white:bgBlack> COM </white:bgBlack> ' . $iString . $msg);
        }
    }

    /**
     * Writes a warning message to the output.
     *
     *
     * @param string|array $message
     * @param OutputInterface $output
     * @param int $indent
     */
    public static function warning($message, OutputInterface $output, int $indent = 0)
    {
        if (false === is_array($message)) {
            $message = [$message];
        }
        $iString = ($indent > 0) ? self::i($indent) : "";
        foreach ($message as $msg) {
            $output->write('<white:bgMagenta> WAR </white:bgMagenta> ' . $iString . $msg);
        }
    }

    /**
     * Writes an error message to the output.
     * If indent is set, all lines of the messages will be indented.
     *
     *
     * @param string|array $message
     * @param OutputInterface $output
     * @param int $indent
     */
    public static function error($message, OutputInterface $output, int $indent = 0)
    {
        if (false === is_array($message)) {
            $message = [$message];
        }
        $iString = ($indent > 0) ? self::i($indent) : "";
        foreach ($message as $msg) {
            $output->write('<white:bgRed> ERR </white:bgRed> ' . $iString . $msg);
        }
    }


    /**
     * Writes a discover message to the output.
     *
     *
     * @param string|array $message
     * @param OutputInterface $output
     * @param int $indent
     */
    public static function discover($message, OutputInterface $output, int $indent = 0)
    {
        if (false === is_array($message)) {
            $message = [$message];
        }
        $iString = ($indent > 0) ? self::i($indent) : "";
        foreach ($message as $msg) {
            $output->write('<white:bgBlue> DIS </white:bgBlue> ' . $iString . $msg);
        }
    }


    /**
     * Returns an indent string which $length is proportional to the given $level.
     *
     * If length is 0 (by default), an empty string will be returned.
     *
     *
     * @param int $level = 0
     * @return string
     */
    public static function i($level = 0)
    {
        if (0 === $level) {
            return "";
        }
        return str_repeat('-', $level * 4) . '> ';
    }

    /**
     * Returns another indent string which $length is proportional to the given $level.
     *
     * If length is 0 (by default), an empty string will be returned.
     *
     *
     * @param int $level = 0
     * @return string
     */
    public static function j($level = 0)
    {
        if (0 === $level) {
            return "";
        }
        return str_repeat(' ', $level * 4) . '- ';
    }

    /**
     * Returns an indent block of white space, which $length is proportional to the given $level.
     *
     * If length is 0 (by default), an empty string will be returned.
     *
     *
     * @param int $level = 0
     * @return string
     */
    public static function s($level = 0)
    {
        if (0 === $level) {
            return "";
        }
        return str_repeat(' ', $level * 4);
    }

}