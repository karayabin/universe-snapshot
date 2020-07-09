[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataFileManagerHandler class
================
2019-09-27 --> 2020-06-23






Introduction
============

The LightUserDataFileManagerHandler class.

The goal of this class is to handle the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) for the Light_UserData plugin.



Class synopsis
==============


class <span class="pl-k">LightUserDataFileManagerHandler</span>  {

- Properties
    - protected [Ling\Light_UserData\Service\LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) [$service](#property-service) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/__construct.md)() : void
    - public [setService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/setService.md)([Ling\Light_UserData\Service\LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) $service) : void
    - public [commit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/commit.md)() : void
    - public [handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/handle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : void
    - public [getResourceInfoFromVirtualMachine](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/getResourceInfoFromVirtualMachine.md)(string $resourceId, ?array $options = []) : void
    - protected [getDestinationPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/getDestinationPath.md)(Ling\Light\Http\HttpRequestInterface $request, Ling\Light_UploadGems\GemHelper\GemHelperInterface $helper) : string
    - private [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/error.md)(string $msg) : void
    - private [getVirtualServerInstance](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/getVirtualServerInstance.md)() : [LightUserDataTemporaryVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.md)
    - private [getVirtualServerContextId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/getVirtualServerContextId.md)() : string

}




Properties
=============

- <span id="property-service"><b>service</b></span>

    This property holds the service for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightUserDataFileManagerHandler::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/__construct.md) &ndash; Builds the LightUserDataFileManagerHandler instance.
- [LightUserDataFileManagerHandler::setService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/setService.md) &ndash; Sets the service.
- [LightUserDataFileManagerHandler::commit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/commit.md) &ndash; Commits the operations found in the virtual file server.
- [LightUserDataFileManagerHandler::handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/handle.md) &ndash; Handles the given [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) action, and returns the appropriate response.
- [LightUserDataFileManagerHandler::getResourceInfoFromVirtualMachine](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/getResourceInfoFromVirtualMachine.md) &ndash; Returns the resource info for the given resource.
- [LightUserDataFileManagerHandler::getDestinationPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/getDestinationPath.md) &ndash; Returns the relative destination path (from the user directory) for the file based on the given request and uploadGem helper.
- [LightUserDataFileManagerHandler::error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/error.md) &ndash; Throws an exception.
- [LightUserDataFileManagerHandler::getVirtualServerInstance](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/getVirtualServerInstance.md) &ndash; Returns a vfs instance.
- [LightUserDataFileManagerHandler::getVirtualServerContextId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/getVirtualServerContextId.md) &ndash; Returns the context id for the vfs.





Location
=============
Ling\Light_UserData\FileManager\LightUserDataFileManagerHandler<br>
See the source code of [Ling\Light_UserData\FileManager\LightUserDataFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/FileManager/LightUserDataFileManagerHandler.php)



SeeAlso
==============
Previous class: [LightUserDataResourceNotFoundException](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Exception/LightUserDataResourceNotFoundException.md)<br>Next class: [LightUserDataRealformHandlerAliasHelper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Realform/RealformHandlerAliasHelper/LightUserDataRealformHandlerAliasHelper.md)<br>
