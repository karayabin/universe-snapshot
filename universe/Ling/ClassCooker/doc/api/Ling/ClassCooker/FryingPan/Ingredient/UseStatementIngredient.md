[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)



The UseStatementIngredient class
================
2020-07-21 --> 2021-06-28






Introduction
============

The UseStatementIngredient class.

This class will add an "use statement" to the class we're working on.



Class synopsis
==============


class <span class="pl-k">UseStatementIngredient</span> extends [BaseIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient.md) implements [IngredientInterface](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/IngredientInterface.md) {

- Inherited properties
    - protected array [BaseIngredient::$valueInfo](#property-valueInfo) ;
    - protected [Ling\ClassCooker\FryingPan\FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md) [BaseIngredient::$fryingPan](#property-fryingPan) ;

- Methods
    - public [execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/UseStatementIngredient/execute.md)() : void

- Inherited methods
    - public [BaseIngredient::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/__construct.md)() : void
    - public static [BaseIngredient::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/create.md)() : self
    - public [BaseIngredient::setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setFryingPan.md)([Ling\ClassCooker\FryingPan\FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md) $pan) : void
    - public [BaseIngredient::setValue](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setValue.md)(string $value, ?array $options = []) : [BaseIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient.md)

}






Methods
==============

- [UseStatementIngredient::execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/UseStatementIngredient/execute.md) &ndash; Executes the goal of the ingredient.
- [BaseIngredient::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/__construct.md) &ndash; Builds the BaseIngredient instance.
- [BaseIngredient::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/create.md) &ndash; Create a new instance and returns it.
- [BaseIngredient::setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setFryingPan.md) &ndash; Attaches a frying pan instance to the ingredient, and returns itself for chaining.
- [BaseIngredient::setValue](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setValue.md) &ndash; Sets the value.





Location
=============
Ling\ClassCooker\FryingPan\Ingredient\UseStatementIngredient<br>
See the source code of [Ling\ClassCooker\FryingPan\Ingredient\UseStatementIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/FryingPan/Ingredient/UseStatementIngredient.php)



SeeAlso
==============
Previous class: [PropertyIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/PropertyIngredient.md)<br>Next class: [ClassCookerHelper](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper.md)<br>
