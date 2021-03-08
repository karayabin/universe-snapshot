[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataVirtualFileManagerHandler class
================
2019-09-27 --> 2021-03-05






Introduction
============

The LightUserDataFileManagerHandler class.

The goal of this class is to handle the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) for the Light_UserData plugin.

WARNING: this class is not fully implemented, the commit method isn't written: as I was about to write it,
I basically changed my mind and thought that a vfs based solution was adding too much complexity compared to the benefits it provides,
and so I switched to a direct interaction with the real server, which is very logical, and thus intuitive, much more maintainable
from the dev's perspective, and the user probably won't notice...

So instead of this class, you should use the LightUserDataDirectFileManagerHandler instead.
But in memory of all the (conception) efforts I put into this class, I keep this just in case, or if I change my mind again,
I won't have to start from scratch...



Class synopsis
==============


class <span class="pl-k">LightUserDataVirtualFileManagerHandler</span> implements [LightUserDataFileManagerHandlerInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerInterface.md) {

- Properties
    - protected [Ling\Light_UserData\Service\LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) [$service](#property-service) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - private [Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md) [$vfsCache](#property-vfsCache) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/__construct.md)() : void
    - public [setService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/setService.md)([Ling\Light_UserData\Service\LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) $service) : void
    - public [commit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/commit.md)() : void
    - public [handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/handle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : void
    - public [getVirtualServerInstance](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/getVirtualServerInstance.md)(string $configId) : [LightUserDataVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md)
    - private [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/error.md)(string $msg) : void
    - private [checkMaxCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/checkMaxCapacity.md)(string $configId, ?string $uploadedFile = null) : void

}




Properties
=============

- <span id="property-service"><b>service</b></span>

    This property holds the service for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-vfsCache"><b>vfsCache</b></span>

    This property holds the vfsCache for this instance.
    
    



Methods
==============

- [LightUserDataVirtualFileManagerHandler::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/__construct.md) &ndash; Builds the LightUserDataVirtualFileManagerHandler instance.
- [LightUserDataVirtualFileManagerHandler::setService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/setService.md) &ndash; Sets the service.
- [LightUserDataVirtualFileManagerHandler::commit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/commit.md) &ndash; Commits the operations found in the virtual file server.
- [LightUserDataVirtualFileManagerHandler::handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/handle.md) &ndash; Handles the given [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) action, and returns the appropriate response.
- [LightUserDataVirtualFileManagerHandler::getVirtualServerInstance](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/getVirtualServerInstance.md) &ndash; Returns the configured LightUserDataVirtualFileSystem instance.
- [LightUserDataVirtualFileManagerHandler::error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/error.md) &ndash; Throws an exception.
- [LightUserDataVirtualFileManagerHandler::checkMaxCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler/checkMaxCapacity.md) &ndash; Checks whether the maximum capacity is or will be exceeded.





Location
=============
Ling\Light_UserData\FileManager\LightUserDataVirtualFileManagerHandler<br>
See the source code of [Ling\Light_UserData\FileManager\LightUserDataVirtualFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/FileManager/LightUserDataVirtualFileManagerHandler.php)



SeeAlso
==============
Previous class: [LightUserDataFileManagerHandlerStacking](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking.md)<br>Next class: [LightUserDataHelper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Helper/LightUserDataHelper.md)<br>
