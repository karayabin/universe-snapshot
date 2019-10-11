[Back to the Ling/Light_BreezeGenerator api](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator.md)



The LingBreezeGenerator class
================
2019-09-11 --> 2019-10-04






Introduction
============

The LingBreezeGenerator class.
This is my personal generator.
Feel free to use it if you like it.


It will generate the following objects, based on the configuration.


- ObjectFactory
- ObjectInterface    (one object per table)
- Object             (one object per table)



The variables array:
-----------------

In this generator, we pass a variables array containing a lot of useful information.
The variables array has at most the following structure:

- namespace: string
- table: string
- className: string
- objectClassName: string
- ric: array
- ricVariables: array (more details in the getRicVariables method comments)
- autoIncrementedKey: string|false
- pluginClassName: string



Class synopsis
==============


class <span class="pl-k">LingBreezeGenerator</span> implements [BreezeGeneratorInterface](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/BreezeGeneratorInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [generate](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/generate.md)(array $conf) : void
    - public [generateObjectClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/generateObjectClass.md)(array $variables) : string
    - public [generateObjectInterfaceClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/generateObjectInterfaceClass.md)(array $variables) : string
    - public [generateObjectFactoryClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/generateObjectFactoryClass.md)(array $variables) : string
    - protected [getClassNameFromTable](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getClassNameFromTable.md)(string $table) : string
    - protected [getRicVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getRicVariables.md)(array $ric, array $types) : array
    - protected [getRicMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getRicMethod.md)(string $method, array $variables) : string
    - protected [getFactoryMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getFactoryMethod.md)(array $variables) : string
    - protected [getInsertMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getInsertMethod.md)(array $variables) : string

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LingBreezeGenerator::__construct](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/__construct.md) &ndash; Builds the LingBreezeGenerator instance.
- [LingBreezeGenerator::setContainer](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/setContainer.md) &ndash; Sets the light service container interface.
- [LingBreezeGenerator::generate](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/generate.md) &ndash; Generates some php classes based on the given configuration.
- [LingBreezeGenerator::generateObjectClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/generateObjectClass.md) &ndash; Returns the content of an object class based on the given variables.
- [LingBreezeGenerator::generateObjectInterfaceClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/generateObjectInterfaceClass.md) &ndash; Returns the content of an object interface class based on the given variables.
- [LingBreezeGenerator::generateObjectFactoryClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/generateObjectFactoryClass.md) &ndash; Returns the content of an object factory class based on the given variables.
- [LingBreezeGenerator::getClassNameFromTable](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getClassNameFromTable.md) &ndash; Returns the class name from the given table name.
- [LingBreezeGenerator::getRicVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getRicVariables.md) &ndash; Returns some useful variables based on the ric array.
- [LingBreezeGenerator::getRicMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getRicMethod.md) &ndash; that the method requires the ric array in order to produce the concrete php method).
- [LingBreezeGenerator::getFactoryMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getFactoryMethod.md) &ndash; inside the generated factory object).
- [LingBreezeGenerator::getInsertMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getInsertMethod.md) &ndash; Returns the content of a php method of type insert (internal naming convention.





Location
=============
Ling\Light_BreezeGenerator\Generator\LingBreezeGenerator<br>
See the source code of [Ling\Light_BreezeGenerator\Generator\LingBreezeGenerator](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/Generator/LingBreezeGenerator.php)



SeeAlso
==============
Previous class: [BreezeGeneratorInterface](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/BreezeGeneratorInterface.md)<br>Next class: [LightBreezeGeneratorService](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService.md)<br>
