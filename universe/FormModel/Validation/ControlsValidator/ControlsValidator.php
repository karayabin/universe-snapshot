<?php


namespace FormModel\Validation\ControlsValidator;


use FormModel\Validation\ControlTest\ControlTestInterface;

class ControlsValidator implements ControlsValidatorInterface
{

    private $tests;


    public function __construct()
    {
        $this->tests = [];
    }

    public static function create()
    {
        return new static();
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function validate($id, $value, array &$errorMessages = [])
    {
        $ret = true;
        if (array_key_exists($id, $this->tests)) {
            list($fieldName, $tests) = $this->tests[$id];
            foreach ($tests as $test) {
                /**
                 * @var $test ControlTestInterface
                 */
                $tags = [
                    'field' => $fieldName,
                ];
                if (false === $test->execute($value, $tags)) {
                    $ret = false;
                    $fmt = $test->getErrorFormatString();
                    $newTags = [];
                    foreach ($tags as $k => $v) {
                        $newTags['{' . $k . '}'] = $v;
                    }
                    $errorMessages[] = str_replace(array_keys($newTags), array_values($newTags), $fmt);
                }
            }
        }
        return $ret;
    }


    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * $tests: ControlTestInterface[]|ControlTestInterface
     */
    public function setTests($id, $fieldName, $tests)
    {
        if (!is_array($tests)) {
            $tests = [$tests];
        }
        $this->tests[$id] = [$fieldName, $tests];
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
}