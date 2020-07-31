<?php


namespace Ling\ClassCooker\FryingPan\Ingredient;


use Ling\ClassCooker\FryingPan\FryingPan;

/**
 * The BaseIngredient class.
 */
abstract class BaseIngredient implements IngredientInterface
{


    /**
     * This property holds the valueInfo for this instance.
     *
     * It's an array:
     * - 0: string, value
     * - 1: array, options
     *
     *
     * @var array
     */
    protected $valueInfo;


    /**
     * This property holds the fryingPan for this instance.
     * @var FryingPan
     */
    protected $fryingPan;


    /**
     * Builds the BaseIngredient instance.
     */
    public function __construct()
    {
        $this->valueInfo = null;
        $this->fryingPan = null;
    }

    /**
     * Create a new instance and returns it.
     * @return self
     */
    public static function create(): self
    {
        return new static();
    }

    /**
     * @implementation
     */
    public function setFryingPan(FryingPan $pan)
    {
        $this->fryingPan = $pan;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the value.
     *
     *
     * @param string $value
     * @param array $options
     * @return $this
     */
    public function setValue(string $value, array $options = []): self
    {
        $this->valueInfo = [$value, $options];
        return $this;
    }


}