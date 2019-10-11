[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataService class
================
2019-09-27 --> 2019-09-27






Introduction
============

The LightUserDataService class.



Class synopsis
==============


class <span class="pl-k">LightUserDataService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected string [$rootDir](#property-rootDir) ;
    - protected [Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md)|null [$currentUser](#property-currentUser) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setRootDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setRootDir.md)(string $rootDir) : void
    - public [setTemporaryUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setTemporaryUser.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user) : void
    - public [unsetTemporaryUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/unsetTemporaryUser.md)() : void
    - public [list](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/list.md)() : void
    - public [save](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/save.md)(string $path, string $data) : void
    - public [getContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getContent.md)(string $path) : string | false
    - protected [getUserDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserDir.md)() : string
    - protected [getDirectoryNameByUserIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getDirectoryNameByUserIdentifier.md)(string $identifier) : string

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    
    

- <span id="property-currentUser"><b>currentUser</b></span>

    This property holds the currentUser for this instance.
    
    



Methods
==============

- [LightUserDataService::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/__construct.md) &ndash; Builds the LightUserDataService instance.
- [LightUserDataService::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setContainer.md) &ndash; Sets the container.
- [LightUserDataService::setRootDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setRootDir.md) &ndash; Sets the rootDir.
- [LightUserDataService::setTemporaryUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setTemporaryUser.md) &ndash; Sets a temporary user.
- [LightUserDataService::unsetTemporaryUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/unsetTemporaryUser.md) &ndash; Unsets the temporary user if any.
- [LightUserDataService::list](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/list.md) &ndash; Returns the array of all files owned by the current user.
- [LightUserDataService::save](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/save.md) &ndash; Saves the data for the current user to the given relative path.
- [LightUserDataService::getContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getContent.md) &ndash; or false if there is no file at the expected location.
- [LightUserDataService::getUserDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserDir.md) &ndash; Returns the directory path of the current user.
- [LightUserDataService::getDirectoryNameByUserIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getDirectoryNameByUserIdentifier.md) &ndash; Returns the directory name from the given user identifier.





Location
=============
Ling\Light_UserData\Service\LightUserDataService<br>
See the source code of [Ling\Light_UserData\Service\LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php)



