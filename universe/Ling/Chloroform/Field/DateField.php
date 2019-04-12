<?php

namespace Ling\Chloroform\Field;


/**
 * The DateField class.
 *
 * Let the user enter a date.
 *
 * The value format is yyyy-mm-dd (the mysql format for date).
 *
 *
 *
 *
 *
 */
class DateField extends AbstractField
{


    /**
     *
     * Builds and returns the instance.
     *
     *
     * @param string $label
     * @param array $properties
     * @return $this
     */
    public static function create(string $label, array $properties = [])
    {
        $properties['label'] = $label;
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