<?php

namespace Ling\Chloroform\Field;


class StringField extends AbstractField
{


    public static function create(string $label, array $options = [])
    {
        $options['label'] = $label;
        return new static($options);
    }


    /**
     * @implementation
     */
    public function getValue()
    {
        return (string)$this->value;
    }
}