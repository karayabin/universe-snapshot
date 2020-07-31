<?php


namespace Ling\ClassCooker\FryingPan\Ingredient;


use Ling\ClassCooker\FryingPan\FryingPan;

/**
 * The IngredientInterface interface.
 */
interface IngredientInterface
{


    /**
     * Executes the goal of the ingredient.
     *
     * @return void
     */
    public function execute();


    /**
     * Attaches a frying pan instance to the ingredient, and returns itself for chaining.
     *
     * The goal is to ease communication between different objects in a larger design.
     *
     * @param FryingPan $pan
     */
    public function setFryingPan(FryingPan $pan);
}