<?php


namespace Ling\FormModel\Validation\ControlTest\WithFields;

use Ling\FormModel\Validation\ControlTest\ControlTest;

class RequiredControlTest extends ControlTest
{
    public function __construct()
    {
        $this->setErrorFormatString("Field {field} is required");
    }


    public function execute($value, array &$tags)
    {
        if (
            null === $value ||
            "" === $value
        ) {
            return false;
        }
        return true;
    }
}