[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Storage\LightKitEditorStorageInterface class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface.md)


LightKitEditorStorageInterface::getPageConf
================



LightKitEditorStorageInterface::getPageConf — Returns the [kit page conf array](https://github.com/lingtalfi/Kit#the-kit-configuration-array) for the given $pageName, or false if a problem occurs.




Description
================


abstract public [LightKitEditorStorageInterface::getPageConf](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface/getPageConf.md)(string $pageName) : array | false




Returns the [kit page conf array](https://github.com/lingtalfi/Kit#the-kit-configuration-array) for the given $pageName, or false if a problem occurs.
If a problem occurs, the errors can be retrieved using the getErrors method.




Parameters
================


- pageName

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [LightKitEditorStorageInterface::getPageConf](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Storage/LightKitEditorStorageInterface.php#L48-L48)


See Also
================

The [LightKitEditorStorageInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface.md) class.

Previous method: [addBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface/addBlock.md)<br>Next method: [getErrors](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface/getErrors.md)<br>

