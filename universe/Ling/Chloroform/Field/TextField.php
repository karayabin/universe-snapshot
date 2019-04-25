<?php

namespace Ling\Chloroform\Field;


/**
 * The TextField class.
 */
class TextField extends AbstractField
{


    /**
     *
     * Builds and returns the instance.
     *
     * The $properties are the same as the one defined in the parent class,
     * with the following additions:
     *
     * - rows: the number of rows of the textarea
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