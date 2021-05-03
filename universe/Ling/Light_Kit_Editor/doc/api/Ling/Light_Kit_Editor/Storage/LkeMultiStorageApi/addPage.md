[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Storage\LkeMultiStorageApi class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi.md)


LkeMultiStorageApi::addPage
================



LkeMultiStorageApi::addPage — Adds a page, or replaces it if it already exist.




Description
================


public [LkeMultiStorageApi::addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/addPage.md)(string $pageName, ?array $pageConf = []) : void




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
See the source code for method [LkeMultiStorageApi::addPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Storage/LkeMultiStorageApi.php#L123-L126)


See Also
================

The [LkeMultiStorageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi.md) class.

Previous method: [setBabyRootDir](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/setBabyRootDir.md)<br>Next method: [addBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi/addBlock.md)<br>

