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
     * Available properties are:
     *
     * - nullable: bool = false, allows an empty date to be formatted as null.
     *      See the @page(getFormattedValue section of the Chloroform conception notes).
     *
     * @param string $label
     * @param array $properties
     * @return $this
     */
    public static function create(string $label, array $properties = [])
    {
        $properties['label'] = $label;
        $properties['nullable'] = $properties['nullable'] ?? false;
        return new static($properties);
    }


    /**
     * @overrides
     */
    public function getValue()
    {
        return (string)$this->value;
    }


    /**
     * @overrides
     */
    public function getFormattedValue()
    {

        if (true === $this->properties['nullable']) {
            if (is_string($this->value) && empty($this->value)) {
                return null;
            }
        }
        return $this->value;
    }

}