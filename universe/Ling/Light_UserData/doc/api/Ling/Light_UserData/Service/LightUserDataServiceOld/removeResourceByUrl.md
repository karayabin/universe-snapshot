[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataServiceOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md)


LightUserDataServiceOld::removeResourceByUrl
================



LightUserDataServiceOld::removeResourceByUrl — Removes the resource which url is given from the database and the filesystem.




Description
================


public [LightUserDataServiceOld::removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/removeResourceByUrl.md)(string $url) : void




Removes the resource which url is given from the database and the filesystem.
Throws an exception in case of a problem.

It also removes the following files if found:
- original file (see the [original file](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md#keeporiginalurl) section for more details)
- related files (see the [related-files.md](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/related-files.md) document for more info)




Parameters
================


- url

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataServiceOld::removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataServiceOld.php#L816-L839)


See Also
================

The [LightUserDataServiceOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md) class.

Previous method: [save](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/save.md)<br>Next method: [removeAllFilesByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/removeAllFilesByResourceIdentifier.md)<br>

