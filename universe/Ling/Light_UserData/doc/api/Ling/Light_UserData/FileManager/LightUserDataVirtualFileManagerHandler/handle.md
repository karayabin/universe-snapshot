[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\FileManager\LightUserDataVirtualFileManagerHandler class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler.md)


LightUserDataVirtualFileManagerHandler::handle
================



LightUserDataVirtualFileManagerHandler::handle — Handles the given [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) action, and returns the appropriate response.




Description
================


public [LightUserDataVirtualFileManagerHandler::handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/handle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : void




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
See the source code for method [LightUserDataVirtualFileManagerHandler::handle](https://github.com/lingtalfi/Light_UserData/blob/master/FileManager/LightUserDataVirtualFileManagerHandler.php#L101-L315)


See Also
================

The [LightUserDataVirtualFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler.md) class.

Previous method: [commit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/commit.md)<br>Next method: [getVirtualServerInstance](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/getVirtualServerInstance.md)<br>

