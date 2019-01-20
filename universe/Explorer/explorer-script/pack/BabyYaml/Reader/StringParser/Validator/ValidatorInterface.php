<?php

namespace BabyYaml\Reader\StringParser\Validator;


/**
 * ValidatorInterface
 * @author Lingtalfi
 * 2015-05-12
 *
 */
interface ValidatorInterface
{
    public function isValid($string, $beginPos, $endPos, $nextSignificantPos);
}
