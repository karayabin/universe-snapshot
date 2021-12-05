[Back to the Ling/Light_UserManager api](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager.md)



The AnyUserManager class
================
2019-05-10 --> 2021-06-24






Introduction
============

The AnyUserManager class.

This class returns a light user, which class is customizable.
The default is a website user ( [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) ).

We store users in the php session.



Class synopsis
==============


class <span class="pl-k">AnyUserManager</span> implements [LightUserManagerInterface](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/LightUserManagerInterface.md) {

- Properties
    - private string [$sessionKey](#property-sessionKey) ;
    - private string [$userClass](#property-userClass) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/__construct.md)() : void
    - public [getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/getUser.md)() : [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md)
    - public [destroyUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/destroyUser.md)() : void
    - public [setUserClass](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUserClass.md)(string $userClass) : void
    - public [getValidWebsiteUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/getValidWebsiteUser.md)() : [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md)
    - public [getOpenUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/getOpenUser.md)() : [LightOpenUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser.md)
    - public [setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUser.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user) : void
    - public [setUserOnce](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUserOnce.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user) : void
    - private [startPhpSession](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/startPhpSession.md)() : void

}




Properties
=============

- <span id="property-sessionKey"><b>sessionKey</b></span>

    This property holds the sessionKey for this instance.
    The sessionKey is the key in the php session which holds
    the user object.
    
    

- <span id="property-userClass"><b>userClass</b></span>

    This property holds the userClass for this instance.
    
    



Methods
==============

- [AnyUserManager::__construct](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/__construct.md) &ndash; Builds the WebsiteUserManager instance.
- [AnyUserManager::getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/getUser.md) &ndash; Returns a light user instance, according to the settings of this instance.
- [AnyUserManager::destroyUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/destroyUser.md) &ndash; Destroys the current user, according to the settings of this instance.
- [AnyUserManager::setUserClass](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUserClass.md) &ndash; Sets the userClass.
- [AnyUserManager::getValidWebsiteUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/getValidWebsiteUser.md) &ndash; 
- [AnyUserManager::getOpenUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/getOpenUser.md) &ndash; Returns an open user.
- [AnyUserManager::setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUser.md) &ndash; Sets the user.
- [AnyUserManager::setUserOnce](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUserOnce.md) &ndash; Sets the user only if there is no user in the session.
- [AnyUserManager::startPhpSession](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/startPhpSession.md) &ndash; Starts the php session if it's not already started.





Location
=============
Ling\Light_UserManager\UserManager\AnyUserManager<br>
See the source code of [Ling\Light_UserManager\UserManager\AnyUserManager](https://github.com/lingtalfi/Light_UserManager/blob/master/UserManager/AnyUserManager.php)



SeeAlso
==============
Previous class: [LightUserManagerService](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Service/LightUserManagerService.md)<br>Next class: [DevUserManager](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/DevUserManager.md)<br>
