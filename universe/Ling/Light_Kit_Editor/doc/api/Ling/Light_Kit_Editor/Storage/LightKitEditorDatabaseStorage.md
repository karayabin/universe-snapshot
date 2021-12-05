[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The LightKitEditorDatabaseStorage class
================
2021-03-01 --> 2021-08-03






Introduction
============

The LightKitEditorDatabaseStorage class.



Class synopsis
==============


class <span class="pl-k">LightKitEditorDatabaseStorage</span> extends [LightKitEditorAbstractStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightKitEditorStorageInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface.md) {

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage/__construct.md)() : void
    - public [addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage/addPage.md)(string $pageName, ?array $pageConf = []) : void
    - public [addBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage/addBlock.md)(string $identifier) : void
    - public [getPageConf](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage/getPageConf.md)(string $pageName) : array | false
    - private [toBaby](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage/toBaby.md)(string $str) : mixed
    - private [getFactory](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage/getFactory.md)() : [CustomLightKitEditorApiFactory](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/CustomLightKitEditorApiFactory.md)

- Inherited methods
    - public [LightKitEditorAbstractStorage::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [LightKitEditorAbstractStorage::getErrors](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/getErrors.md)() : array
    - public [LightKitEditorAbstractStorage::getContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/getContainer.md)() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - protected [LightKitEditorAbstractStorage::addError](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/addError.md)(string $msg) : void

}






Methods
==============

- [LightKitEditorDatabaseStorage::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage/__construct.md) &ndash; Builds the LightKitEditorDatabaseStorage instance.
- [LightKitEditorDatabaseStorage::addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage/addPage.md) &ndash; Adds a page, or replaces it if it already exist.
- [LightKitEditorDatabaseStorage::addBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage/addBlock.md) &ndash; Adds a block if it doesn't already exist.
- [LightKitEditorDatabaseStorage::getPageConf](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage/getPageConf.md) &ndash; Returns the [kit page conf array](https://github.com/lingtalfi/Kit#the-kit-configuration-array) for the given $pageName, or false if a problem occurs.
- [LightKitEditorDatabaseStorage::toBaby](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage/toBaby.md) &ndash; Resolves the given babyYaml string to its original form and returns the result.
- [LightKitEditorDatabaseStorage::getFactory](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage/getFactory.md) &ndash; Returns the kit editor api factory.
- [LightKitEditorAbstractStorage::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/setContainer.md) &ndash; Sets the light service container interface.
- [LightKitEditorAbstractStorage::getErrors](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/getErrors.md) &ndash; Returns the errors that can occur during the execution of certain methods.
- [LightKitEditorAbstractStorage::getContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/getContainer.md) &ndash; Returns the container of this instance.
- [LightKitEditorAbstractStorage::addError](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/addError.md) &ndash; Adds an error message.





Location
=============
Ling\Light_Kit_Editor\Storage\LightKitEditorDatabaseStorage<br>
See the source code of [Ling\Light_Kit_Editor\Storage\LightKitEditorDatabaseStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Storage/LightKitEditorDatabaseStorage.php)



SeeAlso
==============
Previous class: [LightKitEditorBabyYamlStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage.md)<br>Next class: [LightKitEditorStorageInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface.md)<br>
