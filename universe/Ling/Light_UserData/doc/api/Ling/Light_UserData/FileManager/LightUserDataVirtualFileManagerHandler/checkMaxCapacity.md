[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\FileManager\LightUserDataVirtualFileManagerHandler class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler.md)


LightUserDataVirtualFileManagerHandler::checkMaxCapacity
================



LightUserDataVirtualFileManagerHandler::checkMaxCapacity — Checks whether the maximum capacity is or will be exceeded.




Description
================


private [LightUserDataVirtualFileManagerHandler::checkMaxCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/checkMaxCapacity.md)(string $configId, ?string $uploadedFile = null) : void




Checks whether the maximum capacity is or will be exceeded. If so throws an exception.

If a file is being uploaded (i.e. uploadedFile not null), and the max capacity will be exceeded, the file
will be deleted.




Parameters
================


- configId

    

- uploadedFile

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataVirtualFileManagerHandler::checkMaxCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/FileManager/LightUserDataVirtualFileManagerHandler.php#L370-L402)


See Also
================

The [LightUserDataVirtualFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler.md) class.

Previous method: [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/error.md)<br>

