[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\FileManager\LightUserDataFileManagerHandler class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler.md)


LightUserDataFileManagerHandler::handle
================



LightUserDataFileManagerHandler::handle — Handles the given [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) action, and returns the appropriate response.




Description
================


public [LightUserDataFileManagerHandler::handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/handle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : void




Handles the given [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) action, and returns the appropriate response.

Or throws an exception in case of error.




Parameters
================


- action

    

- request

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataFileManagerHandler::handle](https://github.com/lingtalfi/Light_UserData/blob/master/FileManager/LightUserDataFileManagerHandler.php#L189-L585)


See Also
================

The [LightUserDataFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler.md) class.

Previous method: [commit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/commit.md)<br>Next method: [getResourceInfoFromVirtualMachine](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/getResourceInfoFromVirtualMachine.md)<br>

