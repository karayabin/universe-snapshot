<?php


namespace Tokens\SequenceMatcher\Element;

use SequenceMatcher\Element\EntityInterface;

class TokenAlternateEntity implements EntityInterface
{

    private $values;


    /**
     * @param $values : array of int|string|dualArray
     *                      - if it's an int, it represents the Token type
     *                      - if it's a string, it represents the Token string representation
     *                      - if it's a dualArray, it contains two keys (both must match for in order for
     *                          the dualArray to match):
     *                          - 0: the int
     *                          - 1: the string
     *
     *
     */
    public function __construct(array $values)
    {
        $this->values = $values;
    }

    public static function create(array $values)
    {
        return new self($values);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function match($thing)
    {
        foreach ($this->values as $value) {
            if (is_string($thing) && is_string($value)) {
                if ($thing === $value) {
                    return true;
                }
            } else {
                if (is_string($value)) {
                    if ($thing[1] === $value) {
                        return true;
                    }
                } elseif (is_int($value)) {
                    if ($thing[0] === $value) {
                        return true;
                    }
                } else {
                    if (
                        ($thing[0] === $value[0]) &&
                        ($thing[1] === $value[1])
                    ) {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public function __toString()
    {
        return (string)implode('|', $this->values);
    }

}