[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)



The BaseIngredient class
================
2020-07-21 --> 2020-12-08






Introduction
============

The BaseIngredient class.



Class synopsis
==============


abstract class <span class="pl-k">BaseIngredient</span> implements [IngredientInterface](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/IngredientInterface.md) {

- Properties
    - protected array [$valueInfo](#property-valueInfo) ;
    - protected [Ling\ClassCooker\FryingPan\FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md) [$fryingPan](#property-fryingPan) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/__construct.md)() : void
    - public static [create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/create.md)() : self
    - public [setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setFryingPan.md)([Ling\ClassCooker\FryingPan\FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md) $pan) : void
    - public [setValue](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setValue.md)(string $value, ?array $options = []) : [BaseIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient.md)

- Inherited methods
    - abstract public [IngredientInterface::execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/IngredientInterface/execute.md)() : void

}




Properties
=============

- <span id="property-valueInfo"><b>valueInfo</b></span>

    This property holds the valueInfo for this instance.
    
    It's an array:
    - 0: string, value
    - 1: array, options
    
    

- <span id="property-fryingPan"><b>fryingPan</b></span>

    This property holds the fryingPan for this instance.
    
    



Methods
==============

- [BaseIngredient::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/__construct.md) &ndash; Builds the BaseIngredient instance.
- [BaseIngredient::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/create.md) &ndash; Create a new instance and returns it.
- [BaseIngredient::setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setFryingPan.md) &ndash; Attaches a frying pan instance to the ingredient, and returns itself for chaining.
- [BaseIngredient::setValue](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setValue.md) &ndash; Sets the value.
- [IngredientInterface::execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/IngredientInterface/execute.md) &ndash; Executes the goal of the ingredient.





Location
=============
Ling\ClassCooker\FryingPan\Ingredient\BaseIngredient<br>
See the source code of [Ling\ClassCooker\FryingPan\Ingredient\BaseIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/FryingPan/Ingredient/BaseIngredient.php)



SeeAlso
==============
Previous class: [FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md)<br>Next class: [BasicConstructorIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BasicConstructorIngredient.md)<br>
