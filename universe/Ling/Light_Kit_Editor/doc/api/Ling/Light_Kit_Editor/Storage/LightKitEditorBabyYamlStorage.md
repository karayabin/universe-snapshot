[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The LightKitEditorBabyYamlStorage class
================
2021-03-01 --> 2021-04-09






Introduction
============

The LightKitEditorBabyYamlStorage class.



Class synopsis
==============


class <span class="pl-k">LightKitEditorBabyYamlStorage</span> extends [LightKitEditorAbstractStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightKitEditorStorageInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface.md) {

- Properties
    - private string [$rootDir](#property-rootDir) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/__construct.md)() : void
    - public [setRootDir](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/setRootDir.md)(string $rootDir) : void
    - public [addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/addPage.md)(string $pageName, ?array $pageConf = []) : void
    - public [addBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/addBlock.md)(string $identifier) : void
    - public [getPageConf](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/getPageConf.md)(string $pageName) : array | false
    - private [noEscalation](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/noEscalation.md)(string $string) : string
    - private [resolveZoneAlias](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/resolveZoneAlias.md)(string $str) : array | false
    - private [getWidgetsByBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/getWidgetsByBlock.md)(string $blockId) : array
    - private [sanitizePath](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/sanitizePath.md)(string $path) : string

- Inherited methods
    - public [LightKitEditorAbstractStorage::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [LightKitEditorAbstractStorage::getErrors](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/getErrors.md)() : array
    - public [LightKitEditorAbstractStorage::getContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/getContainer.md)() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - protected [LightKitEditorAbstractStorage::addError](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/addError.md)(string $msg) : void

}




Properties
=============

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    
    



Methods
==============

- [LightKitEditorBabyYamlStorage::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/__construct.md) &ndash; Builds the LightKitEditorBabyYamlStorage instance.
- [LightKitEditorBabyYamlStorage::setRootDir](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/setRootDir.md) &ndash; Sets the rootDir.
- [LightKitEditorBabyYamlStorage::addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/addPage.md) &ndash; Adds a page, or replaces it if it already exist.
- [LightKitEditorBabyYamlStorage::addBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/addBlock.md) &ndash; Adds a block if it doesn't already exist.
- [LightKitEditorBabyYamlStorage::getPageConf](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/getPageConf.md) &ndash; Returns the [kit page conf array](https://github.com/lingtalfi/Kit#the-kit-configuration-array) for the given $pageName, or false if a problem occurs.
- [LightKitEditorBabyYamlStorage::noEscalation](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/noEscalation.md) &ndash; Returns a path with any double dots stripped out.
- [LightKitEditorBabyYamlStorage::resolveZoneAlias](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/resolveZoneAlias.md) &ndash; Returns the widgets referenced by the given zone alias, or false if the given string is not a zone alias.
- [LightKitEditorBabyYamlStorage::getWidgetsByBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/getWidgetsByBlock.md) &ndash; Returns the widgets array for the given zone id.
- [LightKitEditorBabyYamlStorage::sanitizePath](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/sanitizePath.md) &ndash; Returns the sanitized version of the given path.
- [LightKitEditorAbstractStorage::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/setContainer.md) &ndash; Sets the light service container interface.
- [LightKitEditorAbstractStorage::getErrors](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/getErrors.md) &ndash; Returns the errors that can occur during the execution of certain methods.
- [LightKitEditorAbstractStorage::getContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/getContainer.md) &ndash; Returns the container of this instance.
- [LightKitEditorAbstractStorage::addError](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage/addError.md) &ndash; Adds an error message.





Location
=============
Ling\Light_Kit_Editor\Storage\LightKitEditorBabyYamlStorage<br>
See the source code of [Ling\Light_Kit_Editor\Storage\LightKitEditorBabyYamlStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Storage/LightKitEditorBabyYamlStorage.php)



SeeAlso
==============
Previous class: [LightKitEditorAbstractStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage.md)<br>Next class: [LightKitEditorDatabaseStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage.md)<br>
