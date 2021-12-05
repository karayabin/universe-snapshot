[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The LightKitEditorStorageInterface class
================
2021-03-01 --> 2021-08-03






Introduction
============

The v interface.



Class synopsis
==============


abstract class <span class="pl-k">LightKitEditorStorageInterface</span>  {

- Methods
    - abstract public [addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface/addPage.md)(string $pageName, ?array $pageConf = []) : void
    - abstract public [addBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface/addBlock.md)(string $identifier) : void
    - abstract public [getPageConf](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface/getPageConf.md)(string $pageName) : array | false
    - abstract public [getErrors](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface/getErrors.md)() : array

}






Methods
==============

- [LightKitEditorStorageInterface::addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface/addPage.md) &ndash; Adds a page, or replaces it if it already exist.
- [LightKitEditorStorageInterface::addBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface/addBlock.md) &ndash; Adds a block if it doesn't already exist.
- [LightKitEditorStorageInterface::getPageConf](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface/getPageConf.md) &ndash; Returns the [kit page conf array](https://github.com/lingtalfi/Kit#the-kit-configuration-array) for the given $pageName, or false if a problem occurs.
- [LightKitEditorStorageInterface::getErrors](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface/getErrors.md) &ndash; Returns the errors that can occur during the execution of certain methods.





Location
=============
Ling\Light_Kit_Editor\Storage\LightKitEditorStorageInterface<br>
See the source code of [Ling\Light_Kit_Editor\Storage\LightKitEditorStorageInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Storage/LightKitEditorStorageInterface.php)



SeeAlso
==============
Previous class: [LightKitEditorDatabaseStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage.md)<br>Next class: [LkeMultiStorageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi.md)<br>
