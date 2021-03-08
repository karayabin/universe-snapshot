[Back to the Ling/Light_UserManager api](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager.md)



The LightUserManagerService class
================
2019-05-10 --> 2021-03-05






Introduction
============

The LightUserManagerService class.



Class synopsis
==============


class <span class="pl-k">LightUserManagerService</span> extends [WebsiteUserManager](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager.md) implements [LightUserManagerInterface](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/LightUserManagerInterface.md) {

- Inherited properties
    - protected string [WebsiteUserManager::$sessionKey](#property-sessionKey) ;

- Inherited methods
    - public [WebsiteUserManager::__construct](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/__construct.md)() : void
    - public [WebsiteUserManager::getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/getUser.md)() : [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md)
    - public [WebsiteUserManager::destroyUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/destroyUser.md)() : void
    - public [WebsiteUserManager::getValidWebsiteUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/getValidWebsiteUser.md)() : [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md)
    - public [WebsiteUserManager::setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/setUser.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user) : void
    - public [WebsiteUserManager::setUserOnce](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/setUserOnce.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user) : void

}






Methods
==============

- [WebsiteUserManager::__construct](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/__construct.md) &ndash; Builds the WebsiteUserManager instance.
- [WebsiteUserManager::getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/getUser.md) &ndash; Returns a light user instance, according to the settings of this instance.
- [WebsiteUserManager::destroyUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/destroyUser.md) &ndash; Destroys the current user, according to the settings of this instance.
- [WebsiteUserManager::getValidWebsiteUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/getValidWebsiteUser.md) &ndash; 
- [WebsiteUserManager::setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/setUser.md) &ndash; Sets the user.
- [WebsiteUserManager::setUserOnce](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/setUserOnce.md) &ndash; Sets the user only if there is no user in the session.





Location
=============
Ling\Light_UserManager\Service\LightUserManagerService<br>
See the source code of [Ling\Light_UserManager\Service\LightUserManagerService](https://github.com/lingtalfi/Light_UserManager/blob/master/Service/LightUserManagerService.php)



SeeAlso
==============
Previous class: [LightUserManagerException](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Exception/LightUserManagerException.md)<br>Next class: [DevUserManager](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/DevUserManager.md)<br>
