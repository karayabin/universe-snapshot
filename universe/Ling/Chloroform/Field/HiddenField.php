<?php

namespace Ling\Chloroform\Field;


/**
 * The HiddenField class.
 */
class HiddenField extends AbstractField
{


    /**
     * Builds the HiddenField instance and returns it.
     *
     *
     * @param string $id
     * @param array $properties
     * @return $this
     */
    public static function create(string $id, array $properties = [])
    {
        $properties['id'] = $id;
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