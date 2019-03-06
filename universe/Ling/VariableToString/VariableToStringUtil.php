<?php

namespace Ling\VariableToString;

/*
 * LingTalfi 2015-10-26
 */
use Ling\VariableToString\Adaptor\VariableToStringAdaptorInterface;

class VariableToStringUtil
{

    /**
     * @var VariableToStringAdaptorInterface[]
     */
    private $adaptors;

    public function __construct()
    {
        $this->adaptors = [];
    }

    public static function create()
    {
        return new static();
    }


    /**
     */
    public function toString($var, $default = "unknown")
    {
        foreach ($this->adaptors as $adaptor) {
            $v = $adaptor->toString($var);
            if (null !== $v) {
                $default = $v;
                break;
            }
        }
        return $default;
    }


    public function addAdaptor(VariableToStringAdaptorInterface $a)
    {
        $this->adaptors[] = $a;
    }

}
