[Back to the Ling/Light_BreezeGenerator api](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator.md)



The LingBreezeGenerator class
================
2019-09-11 --> 2021-05-31






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
- ricPlural: string, the first column of the ric in plural form
- ricVariables: array (more details in the getRicVariables method comments)
- uniqueIndexesVariables: array (more details in the getUniqueIndexesVariables method comments)
- autoIncrementedKey: string|false
- useMicroPermission: bool=false, whether to use the micro permission system
- relativeDirXXX: string=null, the relative path from the base directory (containing all the classes) to the directory containing
     the XXX class. If null, the base directory is the parent of the XXX class.
- hasCustomClass: bool, whether the created class has a custom class associated with it
- foreignKeysInfo: array, foreign keys information (see the [LightDatabaseInfoService->getTableInfo](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTableInfo.md) method for more details)
- types: array, an array of column name => mysql type (see the [LightDatabaseInfoService->getTableInfo](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTableInfo.md) method for more details)
- hasItems: array, see the [LightDatabaseInfoService->getTableInfo](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTableInfo.md) method for more details
- allPrefixes: array, containing all the table prefixes used by this generating session.



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
    - public [generateObjectBase](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/generateObjectBase.md)(array $variables) : string
    - protected [getClassNameFromTable](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getClassNameFromTable.md)(string $table) : string
    - protected [getRicVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getRicVariables.md)(array $ric, array $types) : array
    - protected [getUniqueIndexesVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getUniqueIndexesVariables.md)(array $uniqueIndexes, array $types) : array
    - protected [getRicMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getRicMethod.md)(string $method, array $variables) : string
    - protected [getIdByUniqueIndexMethods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getIdByUniqueIndexMethods.md)(array $variables) : string
    - protected [getItemsMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemsMethod.md)(array $variables) : string
    - protected [getItemMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemMethod.md)(array $variables) : string
    - protected [getItemsInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemsInterfaceMethod.md)(array $variables) : string
    - protected [getItemInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemInterfaceMethod.md)(array $variables) : string
    - protected [getItemsByHasMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemsByHasMethod.md)(array $variables) : string
    - protected [getItemsByHasInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemsByHasInterfaceMethod.md)(array $variables) : string
    - protected [getItemsXXXByHasMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemsXXXByHasMethod.md)(array $variables) : string
    - protected [getItemsXXXByHasInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemsXXXByHasInterfaceMethod.md)(array $variables) : string
    - protected [getIdByUniqueIndexInterfaceMethods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getIdByUniqueIndexInterfaceMethods.md)(array $variables) : string
    - protected [getInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getInterfaceMethod.md)(string $methodName, array $variables) : string
    - protected [getFactoryMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getFactoryMethod.md)(array $variables) : string
    - protected [getInsertMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getInsertMethod.md)(array $variables) : string
    - protected [getAllMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getAllMethod.md)(array $variables) : string
    - private [getGetAllXXXMethodName](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getGetAllXXXMethodName.md)(array $ric) : string
    - private [getClassPath](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getClassPath.md)(string $baseDir, string $className, ?string $relativeDir = null) : string
    - private [getClassNamespace](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getClassNamespace.md)(string $baseNamespace, ?string $relativeNamespace = null) : string
    - private [getEpuratedTableName](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getEpuratedTableName.md)(string $table, array $allPrefixes) : string

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
- [LingBreezeGenerator::generateObjectBase](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/generateObjectBase.md) &ndash; Returns the content of an object abstract parent class based on the given variables.
- [LingBreezeGenerator::getClassNameFromTable](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getClassNameFromTable.md) &ndash; Returns the class name from the given table name.
- [LingBreezeGenerator::getRicVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getRicVariables.md) &ndash; Returns some useful variables based on the ric array.
- [LingBreezeGenerator::getUniqueIndexesVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getUniqueIndexesVariables.md) &ndash; Returns an array of useful variables sets based on the unique indexes array (one set per unique indexes entry is returned).
- [LingBreezeGenerator::getRicMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getRicMethod.md) &ndash; that the method requires the ric array in order to produce the concrete php method).
- [LingBreezeGenerator::getIdByUniqueIndexMethods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getIdByUniqueIndexMethods.md) &ndash; Parses the given variables, and returns an output.
- [LingBreezeGenerator::getItemsMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemsMethod.md) &ndash; Parses the given variables and return a string corresponding to the getItems method.
- [LingBreezeGenerator::getItemMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemMethod.md) &ndash; Parses the given variables and return a string corresponding to the getItem method.
- [LingBreezeGenerator::getItemsInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemsInterfaceMethod.md) &ndash; Parses the given variables and return a string corresponding to the getItemsInterface method.
- [LingBreezeGenerator::getItemInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemInterfaceMethod.md) &ndash; Parses the given variables and return a string corresponding to the getItemInterface method.
- [LingBreezeGenerator::getItemsByHasMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemsByHasMethod.md) &ndash; Parses the given variables and returns a string corresponding to the "getTagsByResourceId" methods.
- [LingBreezeGenerator::getItemsByHasInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemsByHasInterfaceMethod.md) &ndash; Parses the given variables and returns a string corresponding to the "getTagsByResourceId" methods for the interface.
- [LingBreezeGenerator::getItemsXXXByHasMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemsXXXByHasMethod.md) &ndash; Parses the given variables and returns a string corresponding to the "getTagNamesByResourceId" methods.
- [LingBreezeGenerator::getItemsXXXByHasInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getItemsXXXByHasInterfaceMethod.md) &ndash; Parses the given variables and returns a string corresponding to the "getTagNamesByResourceId" interface methods.
- [LingBreezeGenerator::getIdByUniqueIndexInterfaceMethods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getIdByUniqueIndexInterfaceMethods.md) &ndash; Parses the given variables, and returns an output.
- [LingBreezeGenerator::getInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getInterfaceMethod.md) &ndash; Returns the content of the interface method identified by the given methodName.
- [LingBreezeGenerator::getFactoryMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getFactoryMethod.md) &ndash; inside the generated factory object).
- [LingBreezeGenerator::getInsertMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getInsertMethod.md) &ndash; Returns the content of a php method of type insert (internal naming convention).
- [LingBreezeGenerator::getAllMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getAllMethod.md) &ndash; or an empty string otherwise.
- [LingBreezeGenerator::getGetAllXXXMethodName](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getGetAllXXXMethodName.md) &ndash; Returns the getAllXXX method name for the first column of the given ric.
- [LingBreezeGenerator::getClassPath](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getClassPath.md) &ndash; Returns the class path (absolute path to the php file containing the class).
- [LingBreezeGenerator::getClassNamespace](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getClassNamespace.md) &ndash; Returns the namespace of an object based on the given arguments.
- [LingBreezeGenerator::getEpuratedTableName](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/getEpuratedTableName.md) &ndash; Returns the lowercase table name without prefix, based on the given table and prefixes.





Location
=============
Ling\Light_BreezeGenerator\Generator\LingBreezeGenerator<br>
See the source code of [Ling\Light_BreezeGenerator\Generator\LingBreezeGenerator](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/Generator/LingBreezeGenerator.php)



SeeAlso
==============
Previous class: [BreezeGeneratorInterface](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/BreezeGeneratorInterface.md)<br>Next class: [LingBreezeGenerator2](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2.md)<br>
