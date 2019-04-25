<?php

namespace Ling\Chloroform\Field;


/**
 * The SelectField class.
 *
 * The value returned by this field depends on the multiple property (see the create method for more info):
 *
 * - if multiple=false, the value is a string
 * - if multiple=true, the value is an array
 *
 *
 */
class SelectField extends AbstractField
{


    /**
     * This property holds the items for this instance.
     *
     * This is an array which can have one of two forms:
     *
     * - a simple select, in which case the array is an array of value => option label
     * - a select with group (optgroup tag), in which case it's an array of group label => simple select array
     *
     *
     *
     * @var array
     */
    protected $items;


    /**
     * @overrides
     */
    public function __construct(array $properties = [])
    {
        parent::__construct($properties);
        $this->items = [];
    }


    /**
     *
     * Builds and returns the instance.
     *
     *
     * The properties is the same array as the properties from the parent class,
     * with the following additions:
     *
     * - ?multiple: bool=false. Whether to use the html multiple attribute on the select tag.
     *      Note: if multiple is false, the value will be a string, and if mulitple is true,
     *      the value will be an array.
     *
     *
     *
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
     * Sets the items.
     * See the class description for more info.
     *
     * @param array $items
     * @return $this
     */
    public function setItems(array $items)
    {
        $this->items = $items;
        return $this;
    }


    /**
     * @implementation
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            "items" => $this->items,
        ]);
    }
}