<?php


namespace FormModel\Validation\ControlTest\WithFields;

use FormModel\Validation\ControlTest\ControlTest;

class MinCharControlTest extends ControlTest
{

    private $_min;

    public function __construct()
    {
        $this->_min = 0;
        $this->setErrorFormatString("Field {field} requires {min} chars minimum. You typed only {typedChars}.");
    }

    public function min($value)
    {
        $this->_min = $value;
        return $this;
    }


    public function execute($value, array &$tags)
    {
        $tags['min'] = $this->_min;
        if (null === $value) {
            $tags['typedChars'] = 0;
            return false;
        } elseif (is_string($value)) {
            $len = mb_strlen($value);
            $tags['typedChars'] = $len;
            if ($len < $this->_min) {
                return false;
            }
        }
        return true;
    }
}