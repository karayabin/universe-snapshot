<?php


namespace Tokens\SequenceMatcher\Util;


use Tokens\Util\TokenUtil;

class TokensSequenceMatcherUtil
{


    /**
     * Take SequenceMatcher's callback markers as input, and return a marker array,
     * which keys are the marker names, and which values are the string representation
     * of the marker value.
     *
     *
     */
    public static function detokenizeMarkers(array $markers)
    {
        $ret = [];
        foreach ($markers as $id => $allInfo) {
            foreach ($allInfo as $tokenIdentifier) {
                if (is_string($tokenIdentifier)) {
                    $ret[$id][] = $tokenIdentifier;
                } else {
                    $value = $tokenIdentifier[1];
                    if (T_CONSTANT_ENCAPSED_STRING === $tokenIdentifier[0]) {
                        $value = TokenUtil::deEncapsulate($value);
                    }
                    $ret[$id][] = $value;
                }
            }
        }
        return $ret;
    }
}