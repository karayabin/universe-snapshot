[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\FileManager\LightUserDataDirectFileManagerHandler class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler.md)


LightUserDataDirectFileManagerHandler::handle
================



LightUserDataDirectFileManagerHandler::handle — Handles the given [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) action, and returns the appropriate response.




Description
================


public [LightUserDataDirectFileManagerHandler::handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/handle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : void




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
See the source code for method [LightUserDataDirectFileManagerHandler::handle](https://github.com/lingtalfi/Light_UserData/blob/master/FileManager/LightUserDataDirectFileManagerHandler.php#L74-L295)


See Also
================

The [LightUserDataDirectFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler.md) class.

Previous method: [setService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/setService.md)<br>Next method: [storeUserFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/storeUserFile.md)<br>

