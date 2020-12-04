<?php

namespace Ling\Chloroform\Field;


/**
 * The CheckboxField class.
 *
 *
 * The value of this field is an array (or null if not set or no checkbox was checked).
 * It's the same array returned by the html checkbox tag, which is an
 * array of "item value" => "on".
 * The "on" keyword is just a word returned naturally (i.e. it's the way html works) when you post an
 * html form with checkboxes.
 *
 *
 *
 *
 *
 *
 */
class CheckboxField extends AbstractField
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
     * This property holds the isBoolean for this instance.
     * @var bool
     */
    protected $isBoolean;


    /**
     * @overrides
     */
    public function __construct(array $properties = [])
    {
        parent::__construct($properties);
        $this->isBoolean = $properties['bool'] ?? false;
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

    /**
     * @overrides
     */
    public function getFormattedValue()
    {
        if (true === $this->isBoolean) {
            if (null === $this->value) {
                return "0";
            }
            return "1";
        }
        return parent::getFormattedValue();

    }


}