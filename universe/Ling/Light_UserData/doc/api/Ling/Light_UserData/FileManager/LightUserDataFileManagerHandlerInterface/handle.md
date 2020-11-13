[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\FileManager\LightUserDataFileManagerHandlerInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerInterface.md)


LightUserDataFileManagerHandlerInterface::handle
================



LightUserDataFileManagerHandlerInterface::handle — Handles the given [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) action, and returns the appropriate response.




Description
================


abstract public [LightUserDataFileManagerHandlerInterface::handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerInterface/handle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : void




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
See the source code for method [LightUserDataFileManagerHandlerInterface::handle](https://github.com/lingtalfi/Light_UserData/blob/master/FileManager/LightUserDataFileManagerHandlerInterface.php#L30-L30)


See Also
================

The [LightUserDataFileManagerHandlerInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerInterface.md) class.



