<?php

namespace Ling\Chloroform\Field;


/**
 * The TimeField class.
 *
 * Let the user enter a time.
 *
 * The value format depends on the "useSecond" property.
 *
 *
 * If useSecond is true, the format is:
 *
 * - hh:mm:ss
 *
 * If useSecond is false, the format is:
 *
 * - hh:mm
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */
class TimeField extends AbstractField
{


    /**
     *
     * Builds and returns the instance.
     *
     *
     * The properties are the same as the parent class properties,
     * with the addition of the following:
     *
     * - useSecond: bool=true. Whether to use the seconds. (see the class description for more details).
     *
     *
     * @param string $label
     * @param array $properties
     * @return $this
     */
    public static function create(string $label, array $properties = [])
    {
        $properties['label'] = $label;
        if (false === array_key_exists("useSecond", $properties)) {
            $properties['useSecond'] = true;
        }
        return new static($properties);
    }


    /**
     * @implementation
     */
    public function getValue()
    {
        return (string)$this->value;
    }
}