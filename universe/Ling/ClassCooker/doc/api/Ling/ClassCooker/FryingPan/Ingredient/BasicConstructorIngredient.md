[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)



The BasicConstructorIngredient class
================
2020-07-21 --> 2021-03-05






Introduction
============

The BasicConstructorIngredient class.

This class will add a [basic constructor](https://github.com/lingtalfi/ClassCooker/blob/master/doc/pages/frying-pan-conception-notes.md#the-basic-constructor) to the class we're working on.



Class synopsis
==============


class <span class="pl-k">BasicConstructorIngredient</span> extends [BaseIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient.md) implements [IngredientInterface](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/IngredientInterface.md) {

- Inherited properties
    - protected array [BaseIngredient::$valueInfo](#property-valueInfo) ;
    - protected [Ling\ClassCooker\FryingPan\FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md) [BaseIngredient::$fryingPan](#property-fryingPan) ;

- Methods
    - public [execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BasicConstructorIngredient/execute.md)() : void
    - private [getTemplate](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BasicConstructorIngredient/getTemplate.md)(string $className, ?bool $hasParent = false) : string

- Inherited methods
    - public [BaseIngredient::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/__construct.md)() : void
    - public static [BaseIngredient::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/create.md)() : self
    - public [BaseIngredient::setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setFryingPan.md)([Ling\ClassCooker\FryingPan\FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md) $pan) : void
    - public [BaseIngredient::setValue](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setValue.md)(string $value, ?array $options = []) : [BaseIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient.md)

}






Methods
==============

- [BasicConstructorIngredient::execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BasicConstructorIngredient/execute.md) &ndash; Executes the goal of the ingredient.
- [BasicConstructorIngredient::getTemplate](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BasicConstructorIngredient/getTemplate.md) &ndash; Returns a constructor template.
- [BaseIngredient::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/__construct.md) &ndash; Builds the BaseIngredient instance.
- [BaseIngredient::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/create.md) &ndash; Create a new instance and returns it.
- [BaseIngredient::setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setFryingPan.md) &ndash; Attaches a frying pan instance to the ingredient, and returns itself for chaining.
- [BaseIngredient::setValue](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setValue.md) &ndash; Sets the value.





Location
=============
Ling\ClassCooker\FryingPan\Ingredient\BasicConstructorIngredient<br>
See the source code of [Ling\ClassCooker\FryingPan\Ingredient\BasicConstructorIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/FryingPan/Ingredient/BasicConstructorIngredient.php)



SeeAlso
==============
Previous class: [BaseIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient.md)<br>Next class: [BasicConstructorVariableInitIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BasicConstructorVariableInitIngredient.md)<br>
