<?php

namespace Ling\Chloroform\Field;


/**
 * The NumberField class.
 */
class NumberField extends AbstractField
{


    /**
     *
     * Builds and returns the instance.
     *
     * The $properties are the same as the one defined in the parent class,
     * with the following additions:
     *
     * - ?min: specifies the minimum value allowed
     * - ?max: specifies the maximum value allowed
     * - ?step: specifies the legal number intervals
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