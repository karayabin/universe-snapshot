[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataFileManagerHandlerStacking class
================
2019-09-27 --> 2021-03-22






Introduction
============

The LightUserDataFileManagerHandlerStacking class.

The goal of this class is to handle the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) for the Light_UserData plugin.

This class use a stacking vfs, which is not recommended.
Check out the [TemporaryVirtualFileSystem conceptions notes](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md) for more details.



This class is deprecated, I keep it just in case I need a reference to the commit method below.



Class synopsis
==============


class <span class="pl-k">LightUserDataFileManagerHandlerStacking</span>  {

- Properties
    - protected [Ling\Light_UserData\Service\LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) [$service](#property-service) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/__construct.md)() : void
    - public [setService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/setService.md)([Ling\Light_UserData\Service\LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) $service) : void
    - public [commit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/commit.md)() : void
    - public [handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/handle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : void
    - public [getResourceInfoFromVirtualMachine](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/getResourceInfoFromVirtualMachine.md)(string $resourceId, ?array $options = []) : void
    - protected [getDestinationPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/getDestinationPath.md)(Ling\Light\Http\HttpRequestInterface $request, Ling\Light_UploadGems\GemHelper\GemHelper $helper) : string
    - private [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/error.md)(string $msg) : void
    - private [getVirtualServerInstance](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/getVirtualServerInstance.md)() : [LightUserDataTemporaryVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.md)
    - private [getVirtualServerContextId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/getVirtualServerContextId.md)() : string

}




Properties
=============

- <span id="property-service"><b>service</b></span>

    This property holds the service for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightUserDataFileManagerHandlerStacking::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/__construct.md) &ndash; Builds the LightUserDataFileManagerHandler instance.
- [LightUserDataFileManagerHandlerStacking::setService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/setService.md) &ndash; Sets the service.
- [LightUserDataFileManagerHandlerStacking::commit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/commit.md) &ndash; Commits the operations found in the virtual file server.
- [LightUserDataFileManagerHandlerStacking::handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/handle.md) &ndash; Handles the given [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) action, and returns the appropriate response.
- [LightUserDataFileManagerHandlerStacking::getResourceInfoFromVirtualMachine](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/getResourceInfoFromVirtualMachine.md) &ndash; Returns the resource info for the given resource.
- [LightUserDataFileManagerHandlerStacking::getDestinationPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/getDestinationPath.md) &ndash; Returns the relative destination path (from the user directory) for the file based on the given request and uploadGem helper.
- [LightUserDataFileManagerHandlerStacking::error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/error.md) &ndash; Throws an exception.
- [LightUserDataFileManagerHandlerStacking::getVirtualServerInstance](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/getVirtualServerInstance.md) &ndash; Returns a vfs instance.
- [LightUserDataFileManagerHandlerStacking::getVirtualServerContextId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/getVirtualServerContextId.md) &ndash; Returns the context id for the vfs.





Location
=============
Ling\Light_UserData\FileManager\LightUserDataFileManagerHandlerStacking<br>
See the source code of [Ling\Light_UserData\FileManager\LightUserDataFileManagerHandlerStacking](https://github.com/lingtalfi/Light_UserData/blob/master/FileManager/LightUserDataFileManagerHandlerStacking.php)



SeeAlso
==============
Previous class: [LightUserDataFileManagerHandlerInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerInterface.md)<br>Next class: [LightUserDataVirtualFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataVirtualFileManagerHandler.md)<br>
