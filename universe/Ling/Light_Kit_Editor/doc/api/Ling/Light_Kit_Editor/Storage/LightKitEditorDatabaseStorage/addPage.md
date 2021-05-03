[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Storage\LightKitEditorDatabaseStorage class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage.md)


LightKitEditorDatabaseStorage::addPage
================



LightKitEditorDatabaseStorage::addPage — Adds a page, or replaces it if it already exist.




Description
================


public [LightKitEditorDatabaseStorage::addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage/addPage.md)(string $pageName, ?array $pageConf = []) : void




Adds a page, or replaces it if it already exist.

The given pageConf is a [kit configuration array](https://github.com/lingtalfi/Kit#the-kit-configuration-array),
without the zones part (i.e. zones must be added separately).


Throws an exception if something is wrong.




Parameters
================


- pageName

    

- pageConf

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightKitEditorDatabaseStorage::addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Storage/LightKitEditorDatabaseStorage.php#L31-L53)


See Also
================

The [LightKitEditorDatabaseStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage/__construct.md)<br>Next method: [addBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorDatabaseStorage/addBlock.md)<br>

