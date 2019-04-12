<?php

namespace Ling\Chloroform\Field;


/**
 * The RadioField class.
 *
 *
 */
class RadioField extends AbstractField
{


    /**
     * This property holds the items for this instance.
     *
     * This is an array value => label
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
     * See the items property description for more info.
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