<?php


namespace Ling\Chloroform\Validator;


/**
 * The AbstractMinMaxValidator class.
 */
abstract class AbstractMinMaxValidator extends AbstractValidator
{


    /**
     * This property holds the min for this instance.
     * The actual type depends on the concrete class, it might be an int or a string.
     * @var mixed = null
     */
    protected $min;

    /**
     * This property holds the max for this instance.
     * The actual type depends on the concrete class, it might be an int or a string.
     * @var mixed = null
     */
    protected $max;

    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->min = null;
        $this->max = null;
    }


    /**
     * @overrides
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            "min" => $this->min,
            "max" => $this->max,
        ]);
    }


}