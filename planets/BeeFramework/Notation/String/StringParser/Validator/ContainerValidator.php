<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\StringParser\Validator;


/**
 * ContainerValidator
 * @author Lingtalfi
 * 2015-05-12
 *
 */
class ContainerValidator implements ValidatorInterface
{

    private $symbols;

    public function __construct()
    {
        $this->symbols = [];
    }


    public static function create()
    {
        return new static();
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS ValidatorInterface
    //------------------------------------------------------------------------------/
    public function isValid($string, $beginPos, $endPos, $nextSignificantPos)
    {
        $sub = mb_substr($string, $nextSignificantPos);
        if (false !== $sub) {
            foreach ($this->symbols as $s => $info) {
                list($offset, $len) = $info;
                if ($s === mb_substr($string, $nextSignificantPos - $offset, $len)) {
                    return true;
                }
            }
        }
        return false;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setSymbols(array $symbols)
    {
        $this->symbols = [];
        // storing how much blanks does a symbols start with
        // this is how we match a comment symbol preceded by a space for instance " #"
        foreach ($symbols as $s) {
            $len = mb_strlen($s);
            $this->symbols[$s] = [$len - mb_strlen(ltrim($s)), $len];
        }
        return $this;
    }

}
