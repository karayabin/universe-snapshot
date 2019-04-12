<?php

namespace Ling\Chloroform\Field;


/**
 * The ColorField class.
 *
 * Let the user enter a rgb color.
 *
 * The value format is the hash symbol (#) followed by six hexadecimal digits.
 *
 *
 *
 *
 *
 */
class ColorField extends AbstractField
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