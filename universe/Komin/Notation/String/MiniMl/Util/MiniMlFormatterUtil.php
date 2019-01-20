<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Notation\String\MiniMl\Util;

use Komin\Notation\String\MiniMl\Formatter\MiniMlFormatterInterface;


/**
 * MiniMlFormatterUtil
 * @author Lingtalfi
 * 2015-05-21
 *
 */
class MiniMlFormatterUtil
{

    private $formatters;

    public function __construct()
    {
        $this->formatters = [];
    }


    public static function create()
    {
        return new static();
    }


    public function format($string, $format)
    {
        return $this->getFormatter($format)->format($string);
    }

    public function setFormatter($name, MiniMlFormatterInterface $f)
    {
        $this->formatters[$name] = $f;
        return $this;
    }

    public function setFormatters(array $formatters)
    {
        foreach ($formatters as $k => $v) {
            $this->setFormatter($k, $v);
        }
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return MiniMlFormatterInterface
     */
    private function getFormatter($format)
    {
        if (array_key_exists($format, $this->formatters)) {
            return $this->formatters[$format];
        }
        throw new \RuntimeException("Unknown format: $format");
    }
}
