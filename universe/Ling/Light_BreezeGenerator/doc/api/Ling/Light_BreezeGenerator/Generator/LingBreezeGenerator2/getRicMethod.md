[Back to the Ling/Light_BreezeGenerator api](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator.md)<br>
[Back to the Ling\Light_BreezeGenerator\Generator\LingBreezeGenerator2 class](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2.md)


LingBreezeGenerator2::getRicMethod
================



LingBreezeGenerator2::getRicMethod — that the method requires the ric array in order to produce the concrete php method).




Description
================


protected [LingBreezeGenerator2::getRicMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getRicMethod.md)(string $method, array $variables, ?array $options = []) : string




Returns the content of a php method of type ric (internal naming convention, it basically means
that the method requires the ric array in order to produce the concrete php method).

The variables array is described in this class description.

The available options are:

- useMultiple: bool=false,
     I use this option to avoid potential variable replacement conflict.




Parameters
================


- method

    

- variables

    

- options

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LingBreezeGenerator2::getRicMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/Generator/LingBreezeGenerator2.php#L1246-L1332)


See Also
================

The [LingBreezeGenerator2](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2.md) class.

Previous method: [getUniqueIndexesVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getUniqueIndexesVariables.md)<br>Next method: [getIdByUniqueIndexMethods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getIdByUniqueIndexMethods.md)<br>

