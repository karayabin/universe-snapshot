[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)



The MethodIngredient class
================
2020-07-21 --> 2020-12-08






Introduction
============

The MethodIngredient class.

This class will add a method to the class we're working on.

The method will be added using the same heuristics and options as the [ClassCooker->addMethod](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addMethod.md) method.



Class synopsis
==============


class <span class="pl-k">MethodIngredient</span> extends [BaseIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient.md) implements [IngredientInterface](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/IngredientInterface.md) {

- Inherited properties
    - protected array [BaseIngredient::$valueInfo](#property-valueInfo) ;
    - protected [Ling\ClassCooker\FryingPan\FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md) [BaseIngredient::$fryingPan](#property-fryingPan) ;

- Methods
    - public [execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/MethodIngredient/execute.md)() : void
    - private static [compareMethodsContent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/MethodIngredient/compareMethodsContent.md)($methodA, $methodB) : bool

- Inherited methods
    - public [BaseIngredient::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/__construct.md)() : void
    - public static [BaseIngredient::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/create.md)() : self
    - public [BaseIngredient::setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setFryingPan.md)([Ling\ClassCooker\FryingPan\FryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/FryingPan.md) $pan) : void
    - public [BaseIngredient::setValue](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setValue.md)(string $value, ?array $options = []) : [BaseIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient.md)

}






Methods
==============

- [MethodIngredient::execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/MethodIngredient/execute.md) &ndash; Executes the goal of the ingredient.
- [MethodIngredient::compareMethodsContent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/MethodIngredient/compareMethodsContent.md) &ndash; Returns whether the content of methodA is the same as the content of methodB.
- [BaseIngredient::__construct](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/__construct.md) &ndash; Builds the BaseIngredient instance.
- [BaseIngredient::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/create.md) &ndash; Create a new instance and returns it.
- [BaseIngredient::setFryingPan](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setFryingPan.md) &ndash; Attaches a frying pan instance to the ingredient, and returns itself for chaining.
- [BaseIngredient::setValue](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/BaseIngredient/setValue.md) &ndash; Sets the value.





Location
=============
Ling\ClassCooker\FryingPan\Ingredient\MethodIngredient<br>
See the source code of [Ling\ClassCooker\FryingPan\Ingredient\MethodIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/FryingPan/Ingredient/MethodIngredient.php)



SeeAlso
==============
Previous class: [IngredientInterface](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/IngredientInterface.md)<br>Next class: [ParentIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/ParentIngredient.md)<br>
