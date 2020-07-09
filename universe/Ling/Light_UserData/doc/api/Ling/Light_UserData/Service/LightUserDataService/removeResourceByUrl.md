[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::removeResourceByUrl
================



LightUserDataService::removeResourceByUrl — Removes the resource which url is given from the database and the filesystem.




Description
================


public [LightUserDataService::removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeResourceByUrl.md)(string $url) : void




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
See the source code for method [LightUserDataService::removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L767-L790)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [save](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/save.md)<br>Next method: [removeAllFilesByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeAllFilesByResourceIdentifier.md)<br>

