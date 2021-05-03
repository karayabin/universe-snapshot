[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Engine\LightKitEditorEngine class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine.md)


LightKitEditorEngine::getPageConf
================



LightKitEditorEngine::getPageConf — Returns the page conf array for the given $pageName, or false if a problem occurs.




Description
================


public [LightKitEditorEngine::getPageConf](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine/getPageConf.md)(string $pageName) : array | false




Returns the page conf array for the given $pageName, or false if a problem occurs.
If a problem occurs, the errors can be retrieved using the getErrors method.

The returned array is the [page configuration array](https://github.com/lingtalfi/Kit#the-kit-configuration-array).




Parameters
================


- pageName

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [LightKitEditorEngine::getPageConf](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Engine/LightKitEditorEngine.php#L53-L56)


See Also
================

The [LightKitEditorEngine](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine.md) class.

Previous method: [setStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine/setStorage.md)<br>Next method: [getErrors](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine/getErrors.md)<br>

