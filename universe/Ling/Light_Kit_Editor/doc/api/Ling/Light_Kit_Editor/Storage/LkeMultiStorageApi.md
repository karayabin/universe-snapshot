[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The LkeMultiStorageApi class
================
2021-03-01 --> 2021-08-03






Introduction
============

The LkeMultiStorageApi class.



Class synopsis
==============


class <span class="pl-k">LkeMultiStorageApi</span> implements [LightKitEditorStorageInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface.md) {

- Properties
    - private [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)|null [$container](#property-container) ;
    - private string [$storageType](#property-storageType) ;
    - private [Ling\Light_Kit_Editor\Storage\?string](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/?string.md) [$babyRootDir](#property-babyRootDir) ;
    - private [Ling\Light_Kit_Editor\Storage\LightKitEditorBabyYamlStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage.md)|null [$babyStorage](#property-babyStorage) ;
    - private [Ling\Light_Kit_Editor\Storage\LightKitEditorDatabaseStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage.md)|null [$dbStorage](#property-dbStorage) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setStorageType](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/setStorageType.md)(string $storageType) : [LkeMultiStorageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi.md)
    - public [setBabyRootDir](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/setBabyRootDir.md)(string $babyRootDir) : [LkeMultiStorageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi.md)
    - public [addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/addPage.md)(string $pageName, ?array $pageConf = []) : void
    - public [addBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/addBlock.md)(string $identifier) : void
    - public [getPageConf](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/getPageConf.md)(string $pageName) : array | false
    - public [getErrors](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/getErrors.md)() : array
    - private [execute](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/execute.md)(string $methodName, ...$args) : mixed
    - private [getBabyStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/getBabyStorage.md)() : [LightKitEditorBabyYamlStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage.md)
    - private [getDbStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/getDbStorage.md)() : [LightKitEditorDatabaseStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage.md)

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-storageType"><b>storageType</b></span>

    This property holds the storageType for this instance.
    Can be one of:
    - db     (for database)
    - baby   (for babyYaml)
    
    
    Default is db.
    
    

- <span id="property-babyRootDir"><b>babyRootDir</b></span>

    This property holds the babyRootDir for this instance.
    The ${app_dir} tag will be resolved to the actual application directory.
    
    

- <span id="property-babyStorage"><b>babyStorage</b></span>

    This property holds the babyStorage for this instance.
    
    

- <span id="property-dbStorage"><b>dbStorage</b></span>

    This property holds the dbStorage for this instance.
    
    



Methods
==============

- [LkeMultiStorageApi::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/__construct.md) &ndash; Builds the LkeMultiStorageApi instance.
- [LkeMultiStorageApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/setContainer.md) &ndash; Sets the container.
- [LkeMultiStorageApi::setStorageType](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/setStorageType.md) &ndash; Sets the storageType.
- [LkeMultiStorageApi::setBabyRootDir](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/setBabyRootDir.md) &ndash; Sets the babyRootDir.
- [LkeMultiStorageApi::addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/addPage.md) &ndash; Adds a page, or replaces it if it already exist.
- [LkeMultiStorageApi::addBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/addBlock.md) &ndash; Adds a block if it doesn't already exist.
- [LkeMultiStorageApi::getPageConf](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/getPageConf.md) &ndash; Returns the [kit page conf array](https://github.com/lingtalfi/Kit#the-kit-configuration-array) for the given $pageName, or false if a problem occurs.
- [LkeMultiStorageApi::getErrors](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/getErrors.md) &ndash; Returns the errors that can occur during the execution of certain methods.
- [LkeMultiStorageApi::execute](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/execute.md) &ndash; Delegates the method and args to the appropriate storage instance.
- [LkeMultiStorageApi::getBabyStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/getBabyStorage.md) &ndash; Returns a kit editor babyYaml storage instance.
- [LkeMultiStorageApi::getDbStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/getDbStorage.md) &ndash; Returns a kit editor db storage instance.





Location
=============
Ling\Light_Kit_Editor\Storage\LkeMultiStorageApi<br>
See the source code of [Ling\Light_Kit_Editor\Storage\LkeMultiStorageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Storage/LkeMultiStorageApi.php)



SeeAlso
==============
Previous class: [LightKitEditorStorageInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface.md)<br>
