[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Storage\LightKitEditorBabyYamlStorage class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage.md)


LightKitEditorBabyYamlStorage::addPage
================



LightKitEditorBabyYamlStorage::addPage — Adds a page, or replaces it if it already exist.




Description
================


public [LightKitEditorBabyYamlStorage::addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/addPage.md)(string $pageName, ?array $pageConf = []) : void




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
See the source code for method [LightKitEditorBabyYamlStorage::addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Storage/LightKitEditorBabyYamlStorage.php#L51-L69)


See Also
================

The [LightKitEditorBabyYamlStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage.md) class.

Previous method: [setRootDir](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/setRootDir.md)<br>Next method: [addBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorBabyYamlStorage/addBlock.md)<br>

