[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataDirectFileManagerHandler class
================
2019-09-27 --> 2021-02-11






Introduction
============

The LightUserDataFileManagerHandler class.

The goal of this class is to handle the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) for the Light_UserData plugin.
We don't use a virtual file server.
Instead, all interactions are directly written in the real file system and with the real database.



Class synopsis
==============


class <span class="pl-k">LightUserDataDirectFileManagerHandler</span> implements [LightUserDataFileManagerHandlerInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerInterface.md) {

- Properties
    - protected [Ling\Light_UserData\Service\LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) [$service](#property-service) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/__construct.md)() : void
    - public [setService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/setService.md)([Ling\Light_UserData\Service\LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) $service) : void
    - public [handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/handle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : void
    - protected [storeUserFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/storeUserFile.md)(array $params) : string
    - private [resolveFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/resolveFileItems.md)(array &$fileItems, string $userRelPath) : void
    - private [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/error.md)(string $msg, ?int $code = 0) : void

}




Properties
=============

- <span id="property-service"><b>service</b></span>

    This property holds the service for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightUserDataDirectFileManagerHandler::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/__construct.md) &ndash; Builds the LightUserDataDirectFileManagerHandler instance.
- [LightUserDataDirectFileManagerHandler::setService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/setService.md) &ndash; Sets the service.
- [LightUserDataDirectFileManagerHandler::handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/handle.md) &ndash; Handles the given [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) action, and returns the appropriate response.
- [LightUserDataDirectFileManagerHandler::storeUserFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/storeUserFile.md) &ndash; Stores the file described in the given params, and returns the corresponding resourceId.
- [LightUserDataDirectFileManagerHandler::resolveFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/resolveFileItems.md) &ndash; Extracts the upload file tags from the given userRelPath, and injects them in the "path" property of the given file items.
- [LightUserDataDirectFileManagerHandler::error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_UserData\FileManager\LightUserDataDirectFileManagerHandler<br>
See the source code of [Ling\Light_UserData\FileManager\LightUserDataDirectFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/FileManager/LightUserDataDirectFileManagerHandler.php)



SeeAlso
==============
Previous class: [LightUserDataResourceNotFoundException](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Exception/LightUserDataResourceNotFoundException.md)<br>Next class: [LightUserDataFileManagerHandlerInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerInterface.md)<br>
