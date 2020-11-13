<?php

namespace Ling\Chloroform\Field;


/**
 * The DateTimeField class.
 *
 * Let the user enter a date time.
 *
 * The value format depends on the "useSecond" property.
 *
 *
 * If useSecond is true, the format is:
 *
 * - yyyy-mm-dd hh:mm:ss
 *
 * If useSecond is false, the format is:
 *
 * - yyyy-mm-dd hh:mm
 *
 *
 * The "nullable" property defines whether this field can return null as its formatted value.
 * If "nullable" is true (default is false), then if the date part (yyyy-mm-dd) of the datetime is missing,
 * null will be returned. This allows the renderer to use a control widget which renders date and time separately.
 *
 *
 * See the @page(getFormattedValue concept in the chloroform conception notes) for more details.
 *
 *
 *
 *
 */
class DateTimeField extends AbstractField
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
     * - nullable: bool=false. Whether to accept null values. See the class comments for more details.
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
        if (false === array_key_exists("nullable", $properties)) {
            $properties['nullable'] = false;
        }
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
            if (is_string($this->value) && 19 !== strlen($this->value)) {
                return null;
            }
        }
        return $this->value;
    }
}