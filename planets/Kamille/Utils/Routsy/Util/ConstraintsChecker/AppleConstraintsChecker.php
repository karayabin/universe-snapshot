<?php


namespace Kamille\Utils\Routsy\Util\ConstraintsChecker;


use Kamille\Utils\Routsy\Util\ConstraintsChecker\Exception\AppleConstraintsCheckerException;

class AppleConstraintsChecker{

    public static function checkConstraints(array $urlParams, array $constraints)
    {
        /**
         * In this implementation, if a constraint is defined for a given param and the param doesn't exist,
         * then the constraint doesn't fail.
         * In other words, a constraint is only applied to a param IF it exists.
         *
         */
        foreach ($urlParams as $key => $value) {
            if (array_key_exists($key, $constraints)) {
                $constraint = $constraints[$key];
                if (is_array($constraint)) {
                    if (false === in_array($value, $constraint, true)) {
                        return false;
                    }
                } elseif (is_string($constraint)) {
                    $first = substr($constraint, 0, 1);
                    if ('<' === $first || '>' === $first) {
                        if ('>' === $first) {
                            if (false !== strpos($constraint, '<')) {
                                // between

                                $constraint = substr($constraint, 1);

                                $p = explode('<', $constraint, 2);
                                $a = $p[0];
                                $b = $p[1];
                                $aEqual = false;
                                $bEqual = false;
                                if (0 === strpos($a, '=')) {
                                    $a = substr($a, 1);
                                    $aEqual = true;
                                }
                                if (0 === strpos($b, '=')) {
                                    $b = substr($b, 1);
                                    $bEqual = true;
                                }

                                $a = (float)$a;
                                $b = (float)$b;
                                $value = (float)$value;

                                if (false === $aEqual && false === $bEqual) {
                                    if ($value <= $a || $value >= $b) {
                                        return false;
                                    }
                                }
                                elseif (false === $aEqual && true === $bEqual) {
                                    if ($value <= $a || $value > $b) {
                                        return false;
                                    }
                                }
                                elseif (true === $aEqual && true === $bEqual) {
                                    if ($value < $a || $value > $b) {
                                        return false;
                                    }
                                }
                                elseif (true === $aEqual && false === $bEqual) {
                                    if ($value < $a || $value >= $b) {
                                        return false;
                                    }
                                }


                            } else {
                                // > or >=
                                if ('=' === substr($constraint, 1, 1)) {
                                    $val = substr($constraint, 2);
                                    if ((float)$val > (float)$value) {
                                        return false;
                                    }
                                } else {
                                    $val = substr($constraint, 1);
                                    if ((float)$val >= (float)$value) {
                                        return false;
                                    }
                                }
                            }
                        } else {


                            // < or <=
                            if ('=' === substr($constraint, 1, 1)) {
                                $val = substr($constraint, 2);
                                if ((float)$val < (float)$value) {
                                    return false;
                                }
                            } else {
//                                a($constraint);
                                $val = substr($constraint, 1);
//                                a($val);
                                if ((float)$val <= (float)$value) {
                                    return false;
                                }
                            }
                        }
                    } else {
                        if ($value !== $constraint) {
                            return false;
                        }
                    }
                } else {
                    throw new AppleConstraintsCheckerException("Unknown constraint type: $constraint");
                }
            }
        }
        return true;
    }

}