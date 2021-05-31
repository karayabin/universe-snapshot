[Back to the Ling/Light_UserManager api](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager.md)



The WebsiteUserManager class
================
2019-05-10 --> 2021-05-31






Introduction
============

The WebsiteUserManager class.

This class returns a refreshed website user ( [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) ).

Under the hood, the website user is stored in a php session.



Class synopsis
==============


class <span class="pl-k">WebsiteUserManager</span> implements [LightUserManagerInterface](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/LightUserManagerInterface.md) {

- Properties
    - protected string [$sessionKey](#property-sessionKey) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/__construct.md)() : void
    - public [getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/getUser.md)() : [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md)
    - public [destroyUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/destroyUser.md)() : void
    - public [getValidWebsiteUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/getValidWebsiteUser.md)() : [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md)
    - public [setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/setUser.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user) : void
    - public [setUserOnce](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/setUserOnce.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user) : void
    - private [startPhpSession](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/startPhpSession.md)() : void

}




Properties
=============

- <span id="property-sessionKey"><b>sessionKey</b></span>

    This property holds the sessionKey for this instance.
    The sessionKey is the key in the php session which holds
    the user object.
    
    



Methods
==============

- [WebsiteUserManager::__construct](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/__construct.md) &ndash; Builds the WebsiteUserManager instance.
- [WebsiteUserManager::getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/getUser.md) &ndash; Returns a light user instance, according to the settings of this instance.
- [WebsiteUserManager::destroyUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/destroyUser.md) &ndash; Destroys the current user, according to the settings of this instance.
- [WebsiteUserManager::getValidWebsiteUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/getValidWebsiteUser.md) &ndash; 
- [WebsiteUserManager::setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/setUser.md) &ndash; Sets the user.
- [WebsiteUserManager::setUserOnce](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/setUserOnce.md) &ndash; Sets the user only if there is no user in the session.
- [WebsiteUserManager::startPhpSession](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/startPhpSession.md) &ndash; Starts the php session if it's not already started.





Location
=============
Ling\Light_UserManager\UserManager\WebsiteUserManager<br>
See the source code of [Ling\Light_UserManager\UserManager\WebsiteUserManager](https://github.com/lingtalfi/Light_UserManager/blob/master/UserManager/WebsiteUserManager.php)



SeeAlso
==============
Previous class: [LightUserManagerInterface](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/LightUserManagerInterface.md)<br>
