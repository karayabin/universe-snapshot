[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Storage\LightKitEditorStorageInterface class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface.md)


LightKitEditorStorageInterface::addPage
================



LightKitEditorStorageInterface::addPage — Adds a page, or replaces it if it already exist.




Description
================


abstract public [LightKitEditorStorageInterface::addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface/addPage.md)(string $pageName, ?array $pageConf = []) : void




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
See the source code for method [LightKitEditorStorageInterface::addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Storage/LightKitEditorStorageInterface.php#L26-L26)


See Also
================

The [LightKitEditorStorageInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface.md) class.

Next method: [addBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface/addBlock.md)<br>

