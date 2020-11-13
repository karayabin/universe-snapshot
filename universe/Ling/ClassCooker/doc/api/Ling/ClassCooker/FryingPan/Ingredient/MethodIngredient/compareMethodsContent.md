[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)<br>
[Back to the Ling\ClassCooker\FryingPan\Ingredient\MethodIngredient class](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/MethodIngredient.md)


MethodIngredient::compareMethodsContent
================



MethodIngredient::compareMethodsContent — Returns whether the content of methodA is the same as the content of methodB.




Description
================


private static [MethodIngredient::compareMethodsContent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/MethodIngredient/compareMethodsContent.md)($methodA, $methodB) : bool




Returns whether the content of methodA is the same as the content of methodB.

This is a line by line comparison of the method contents, and each line is trimmed before comparison.
This method returns true only if every line matches.




Parameters
================


- methodA

    

- methodB

    


Return values
================

Returns bool.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MethodIngredient::compareMethodsContent](https://github.com/lingtalfi/ClassCooker/blob/master/FryingPan/Ingredient/MethodIngredient.php#L108-L169)


See Also
================

The [MethodIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/MethodIngredient.md) class.

Previous method: [execute](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/MethodIngredient/execute.md)<br>

