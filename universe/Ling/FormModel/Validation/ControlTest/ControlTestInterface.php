<?php


namespace Ling\FormModel\Validation\ControlTest;


/**
 * By convention,
 * the {field} tag will be available (and therefore reserved) for all ControlTests.
 * It should be set automatically by the concrete ControlsValidator instance,
 * at least if the user set it.
 *
 */
interface ControlTestInterface
{

    /**
     * @return bool, whether or not the test was valid.
     *
     * $value: the value to test.
     *
     * $tags: you can also feed tags, which are then used in the creation of the error message
     * (based on the errorFormatString).
     */
    public function execute($value, array &$tags);

    public function getErrorFormatString();
}

