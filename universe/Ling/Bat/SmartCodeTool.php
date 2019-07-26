<?php

namespace Ling\Bat;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\BabyYaml\Reader\Exception\ParseErrorException;

/**
 * The SmartCodeTool class.
 * Note: I found ShortCodeTool buggy and not flexible enough, hence this class (which is some kind
 * of update on shortcode tool).
 *
 *
 *
 *
 *
 * Smart code is an alias for [BabyYaml](https://github.com/lingtalfi/BabyYaml) inline syntax.
 *
 */
class SmartCodeTool
{


    /**
     * Parses the given $expr and returns the corresponding result.
     *
     * Under the hood, the babyYaml inline parser is used.
     * Please refer to the BabyYaml documentation for more details.
     *
     *
     * @param string $expr
     * @return mixed
     * @throws ParseErrorException
     * An exception is thrown when a syntax error occurs.
     */
    public static function parse(string $expr)
    {
        $var = BabyYamlUtil::readBabyYamlString('root: ' . $expr);
        return $var['root'];
    }
}