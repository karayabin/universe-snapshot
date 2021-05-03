[Back to the Ling/Light_BreezeGenerator api](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator.md)



The LingBreezeGenerator2 class
================
2019-09-11 --> 2021-03-15






Introduction
============

The LingBreezeGenerator2 class.


This is my personal generator.
Feel free to use it if you like it.

See the [ling-breeze-generator-2.md](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-breeze-generator-2.md) document for more details.




The variables array:
-----------------

In this generator, we pass a variables array containing a lot of useful information.
The variables array has at most the following structure:

- namespace: string
- table: string
- className: string
- classNamePlural: string
- humanName: string
- humanNamePlural: string
- variableName: string
- variableNamePlural: string
- objectClassName: string
- ric: array
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


class <span class="pl-k">LingBreezeGenerator2</span> implements [BreezeGeneratorInterface](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/BreezeGeneratorInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - private array [$alreadyUsedMethodNames](#property-alreadyUsedMethodNames) ;
    - private array [$alreadyUsedMethodNamesInterface](#property-alreadyUsedMethodNamesInterface) ;
    - private bool [$_usePrefixInMethodNames](#property-_usePrefixInMethodNames) ;
    - private array [$_allPrefixes](#property-_allPrefixes) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [generate](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generate.md)(array $conf) : void
    - public [generateObjectClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateObjectClass.md)(array $variables) : string
    - public [generateObjectInterfaceClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateObjectInterfaceClass.md)(array $variables) : string
    - public [generateObjectFactoryClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateObjectFactoryClass.md)(array $variables) : string
    - public [generateCustomClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateCustomClass.md)(array $variables) : string
    - public [generateCustomBaseClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateCustomBaseClass.md)(array $variables) : string
    - public [generateCustomFactory](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateCustomFactory.md)(array $variables) : string
    - public [generateCustomInterfaces](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateCustomInterfaces.md)(array $variables) : string
    - public [generateObjectBase](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateObjectBase.md)(array $variables) : string
    - protected [getClassNameFromTable](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getClassNameFromTable.md)(string $table) : string
    - protected [getRicVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getRicVariables.md)(array $ric, array $types) : array
    - protected [getUniqueIndexesVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getUniqueIndexesVariables.md)(array $uniqueIndexes, array $types) : array
    - protected [getFetchFetchAllYYYMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getFetchFetchAllYYYMethod.md)(array $variables) : string
    - protected [getGetUserByIdMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getGetUserByIdMethod.md)(array $variables) : string
    - protected [getUpdateUserByIdMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getUpdateUserByIdMethod.md)(array $variables) : string
    - protected [getUpdateUserMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getUpdateUserMethod.md)(array $variables) : string
    - protected [getDeleteUserByIdMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteUserByIdMethod.md)(array $variables) : string
    - protected [getDeleteUserByIdsMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteUserByIdsMethod.md)(array $variables) : string
    - protected [getIdByUniqueIndexMethods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getIdByUniqueIndexMethods.md)(array $variables) : string
    - protected [getItemsMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemsMethod.md)(array $variables, ?string $template = null) : string
    - protected [getItemMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemMethod.md)(array $variables) : string
    - protected [getItemsInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemsInterfaceMethod.md)(array $variables, ?string $template = null) : string
    - protected [getItemInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemInterfaceMethod.md)(array $variables) : string
    - protected [getItemsByHasMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemsByHasMethod.md)(array $variables) : string
    - protected [getItemsByHasInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemsByHasInterfaceMethod.md)(array $variables) : string
    - protected [getItemsXXXByHasMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemsXXXByHasMethod.md)(array $variables) : string
    - protected [getItemsXXXByHasInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemsXXXByHasInterfaceMethod.md)(array $variables) : string
    - protected [getIdByUniqueIndexInterfaceMethods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getIdByUniqueIndexInterfaceMethods.md)(array $variables) : string
    - protected [getMultipleInsertXXXInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getMultipleInsertXXXInterfaceMethod.md)(array $variables) : string
    - protected [getFetchFetchAllXXXInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getFetchFetchAllXXXInterfaceMethod.md)(array $variables) : string
    - protected [getInsertXXXInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getInsertXXXInterfaceMethod.md)(array $variables) : string
    - protected [getGetXXXByIdInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getGetXXXByIdInterfaceMethod.md)(array $variables) : string
    - protected [getGetAllXXXInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getGetAllXXXInterfaceMethod.md)(array $variables) : string
    - protected [getUpdateXXXByIdInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getUpdateXXXByIdInterfaceMethod.md)(array $variables) : string
    - protected [getUpdateXXXInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getUpdateXXXInterfaceMethod.md)(array $variables) : string
    - protected [getDeleteXXXByIdInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteXXXByIdInterfaceMethod.md)(array $variables) : string
    - protected [getDeleteXXXByIdsInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteXXXByIdsInterfaceMethod.md)(array $variables) : string
    - protected [getFactoryMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getFactoryMethod.md)(array $variables) : string
    - protected [getInsertMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getInsertMethod.md)(array $variables) : string
    - protected [getInsertMultipleMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getInsertMultipleMethod.md)(array $variables) : string
    - protected [getAllMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getAllMethod.md)(array $variables) : string
    - protected [getDeleteMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteMethod.md)() : string
    - protected [getDeleteByFkMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteByFkMethod.md)(array $variables) : string
    - protected [getDeleteMethodInterface](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteMethodInterface.md)(array $variables) : string
    - protected [getDeleteByFkMethodInterface](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteByFkMethodInterface.md)(array $variables) : string
    - protected [log](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/log.md)($msg) : void
    - private [getGetAllXXXMethodName](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getGetAllXXXMethodName.md)(array $ric) : string
    - private [getClassPath](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getClassPath.md)(string $baseDir, string $className, ?string $relativeDir = null) : string
    - private [getClassNamespace](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getClassNamespace.md)(string $baseNamespace, ?string $relativeNamespace = null) : string
    - private [getEpuratedTableName](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getEpuratedTableName.md)(string $table, array $allPrefixes) : string
    - private [replaceCommonTags](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/replaceCommonTags.md)(string $expression) : string
    - private [getLineStack](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getLineStack.md)(array $ricVariables, ?int $indent = 3) : string
    - private [error](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-alreadyUsedMethodNames"><b>alreadyUsedMethodNames</b></span>

    This property holds the alreadyUsedMethodNames for this instance.
    Not all already used method names are stored here, just those that might create conflicts.
    
    

- <span id="property-alreadyUsedMethodNamesInterface"><b>alreadyUsedMethodNamesInterface</b></span>

    This property holds the alreadyUsedMethodNamesInterface for this instance.
    Same as $alreadyUsedMethodNames, but for interfaces.
    
    

- <span id="property-_usePrefixInMethodNames"><b>_usePrefixInMethodNames</b></span>

    This property holds the _usePrefixInMethodNames for this instance.
    
    

- <span id="property-_allPrefixes"><b>_allPrefixes</b></span>

    This property holds the _allPrefixes for this instance.
    
    



Methods
==============

- [LingBreezeGenerator2::__construct](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/__construct.md) &ndash; Builds the LingBreezeGenerator instance.
- [LingBreezeGenerator2::setContainer](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/setContainer.md) &ndash; Sets the light service container interface.
- [LingBreezeGenerator2::generate](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generate.md) &ndash; Generates some php classes based on the given configuration.
- [LingBreezeGenerator2::generateObjectClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateObjectClass.md) &ndash; Returns the content of an object class based on the given variables.
- [LingBreezeGenerator2::generateObjectInterfaceClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateObjectInterfaceClass.md) &ndash; Returns the content of an object interface class based on the given variables.
- [LingBreezeGenerator2::generateObjectFactoryClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateObjectFactoryClass.md) &ndash; Returns the content of an object factory class based on the given variables.
- [LingBreezeGenerator2::generateCustomClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateCustomClass.md) &ndash; Returns the content of a custom class based on the given variables.
- [LingBreezeGenerator2::generateCustomBaseClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateCustomBaseClass.md) &ndash; Returns the content of a custom base class based on the given variables.
- [LingBreezeGenerator2::generateCustomFactory](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateCustomFactory.md) &ndash; Returns the content of a custom factory based on the given variables.
- [LingBreezeGenerator2::generateCustomInterfaces](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateCustomInterfaces.md) &ndash; Returns the content of a custom interfaces based on the given variables.
- [LingBreezeGenerator2::generateObjectBase](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/generateObjectBase.md) &ndash; Returns the content of an object abstract parent class based on the given variables.
- [LingBreezeGenerator2::getClassNameFromTable](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getClassNameFromTable.md) &ndash; Returns the class name from the given table name.
- [LingBreezeGenerator2::getRicVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getRicVariables.md) &ndash; Returns some useful variables based on the ric array.
- [LingBreezeGenerator2::getUniqueIndexesVariables](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getUniqueIndexesVariables.md) &ndash; Returns an array of useful variables sets based on the unique indexes array (one set per unique indexes entry is returned).
- [LingBreezeGenerator2::getFetchFetchAllYYYMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getFetchFetchAllYYYMethod.md) &ndash; Returns the content of the fetchFetchAllYYY method.
- [LingBreezeGenerator2::getGetUserByIdMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getGetUserByIdMethod.md) &ndash; Returns the content of the getUserById method.
- [LingBreezeGenerator2::getUpdateUserByIdMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getUpdateUserByIdMethod.md) &ndash; Returns the content of the updateUserById method.
- [LingBreezeGenerator2::getUpdateUserMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getUpdateUserMethod.md) &ndash; Returns the content of the updateUser method.
- [LingBreezeGenerator2::getDeleteUserByIdMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteUserByIdMethod.md) &ndash; Returns the content of the deleteUserById method.
- [LingBreezeGenerator2::getDeleteUserByIdsMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteUserByIdsMethod.md) &ndash; Returns the content of the deleteUserByIds method.
- [LingBreezeGenerator2::getIdByUniqueIndexMethods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getIdByUniqueIndexMethods.md) &ndash; Parses the given variables, and returns an output.
- [LingBreezeGenerator2::getItemsMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemsMethod.md) &ndash; Parses the given variables and return a string corresponding to the getItems method.
- [LingBreezeGenerator2::getItemMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemMethod.md) &ndash; Parses the given variables and return a string corresponding to the getItem method.
- [LingBreezeGenerator2::getItemsInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemsInterfaceMethod.md) &ndash; Parses the given variables and return a string corresponding to the getItemsInterface method.
- [LingBreezeGenerator2::getItemInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemInterfaceMethod.md) &ndash; Parses the given variables and return a string corresponding to the getItemInterface method.
- [LingBreezeGenerator2::getItemsByHasMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemsByHasMethod.md) &ndash; Parses the given variables and returns a string corresponding to the "getTagsByResourceId" methods.
- [LingBreezeGenerator2::getItemsByHasInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemsByHasInterfaceMethod.md) &ndash; Parses the given variables and returns a string corresponding to the "getTagsByResourceId" methods for the interface.
- [LingBreezeGenerator2::getItemsXXXByHasMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemsXXXByHasMethod.md) &ndash; Parses the given variables and returns a string corresponding to the "getTagNamesByResourceId" methods.
- [LingBreezeGenerator2::getItemsXXXByHasInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getItemsXXXByHasInterfaceMethod.md) &ndash; Parses the given variables and returns a string corresponding to the "getTagNamesByResourceId" interface methods.
- [LingBreezeGenerator2::getIdByUniqueIndexInterfaceMethods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getIdByUniqueIndexInterfaceMethods.md) &ndash; Parses the given variables, and returns an output.
- [LingBreezeGenerator2::getMultipleInsertXXXInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getMultipleInsertXXXInterfaceMethod.md) &ndash; Returns the content of the multipleInsertXXX method for the interfaces.
- [LingBreezeGenerator2::getFetchFetchAllXXXInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getFetchFetchAllXXXInterfaceMethod.md) &ndash; Returns the content of the fetchFetchAllXXX method for the interfaces.
- [LingBreezeGenerator2::getInsertXXXInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getInsertXXXInterfaceMethod.md) &ndash; Returns the content of the insertXXX method for the interfaces.
- [LingBreezeGenerator2::getGetXXXByIdInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getGetXXXByIdInterfaceMethod.md) &ndash; Returns the content of the getXXXById method for the interfaces.
- [LingBreezeGenerator2::getGetAllXXXInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getGetAllXXXInterfaceMethod.md) &ndash; Returns the content of the getAllXXX method for the interfaces.
- [LingBreezeGenerator2::getUpdateXXXByIdInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getUpdateXXXByIdInterfaceMethod.md) &ndash; Returns the content of the updateXXXById method for the interfaces.
- [LingBreezeGenerator2::getUpdateXXXInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getUpdateXXXInterfaceMethod.md) &ndash; Returns the content of the updateXXX method for the interfaces.
- [LingBreezeGenerator2::getDeleteXXXByIdInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteXXXByIdInterfaceMethod.md) &ndash; Returns the content of the deleteXXXById method for the interfaces.
- [LingBreezeGenerator2::getDeleteXXXByIdsInterfaceMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteXXXByIdsInterfaceMethod.md) &ndash; Returns the content of the deleteXXXByIds method for the interfaces.
- [LingBreezeGenerator2::getFactoryMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getFactoryMethod.md) &ndash; inside the generated factory object).
- [LingBreezeGenerator2::getInsertMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getInsertMethod.md) &ndash; Returns the content of a php method of type insert (internal naming convention).
- [LingBreezeGenerator2::getInsertMultipleMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getInsertMultipleMethod.md) &ndash; Returns the content of a php method of type insert multiple (internal naming convention).
- [LingBreezeGenerator2::getAllMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getAllMethod.md) &ndash; or an empty string otherwise.
- [LingBreezeGenerator2::getDeleteMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteMethod.md) &ndash; Returns the content of the delete template.
- [LingBreezeGenerator2::getDeleteByFkMethod](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteByFkMethod.md) &ndash; Returns the content of the "delete by fk" method template.
- [LingBreezeGenerator2::getDeleteMethodInterface](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteMethodInterface.md) &ndash; Returns the content of the delete template for the interface.
- [LingBreezeGenerator2::getDeleteByFkMethodInterface](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getDeleteByFkMethodInterface.md) &ndash; Returns the content of the delete by fk template for the interface if there is a foreign key.
- [LingBreezeGenerator2::log](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/log.md) &ndash; Sends a message to the log.
- [LingBreezeGenerator2::getGetAllXXXMethodName](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getGetAllXXXMethodName.md) &ndash; Returns the getAllXXX method name for the first column of the given ric.
- [LingBreezeGenerator2::getClassPath](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getClassPath.md) &ndash; Returns the class path (absolute path to the php file containing the class).
- [LingBreezeGenerator2::getClassNamespace](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getClassNamespace.md) &ndash; Returns the namespace of an object based on the given arguments.
- [LingBreezeGenerator2::getEpuratedTableName](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getEpuratedTableName.md) &ndash; Returns the lowercase table name without prefix, based on the given table and prefixes.
- [LingBreezeGenerator2::replaceCommonTags](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/replaceCommonTags.md) &ndash; Injects the common tags in the given expression and returns the result.
- [LingBreezeGenerator2::getLineStack](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/getLineStack.md) &ndash; Returns $indent lines of marker lines as a string.
- [LingBreezeGenerator2::error](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator2/error.md) &ndash; Throws an error message.





Location
=============
Ling\Light_BreezeGenerator\Generator\LingBreezeGenerator2<br>
See the source code of [Ling\Light_BreezeGenerator\Generator\LingBreezeGenerator2](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/Generator/LingBreezeGenerator2.php)



SeeAlso
==============
Previous class: [LingBreezeGenerator](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator.md)<br>Next class: [LightBreezeGeneratorService](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService.md)<br>
