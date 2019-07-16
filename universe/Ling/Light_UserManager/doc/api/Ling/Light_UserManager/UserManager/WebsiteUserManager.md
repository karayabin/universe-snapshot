[Back to the Ling/Light_UserManager api](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager.md)



The WebsiteUserManager class
================
2019-05-10 --> 2019-07-12






Introduction
============

The WebsiteUserManager class.

This class returns a refreshed website user ( [WebsiteLightUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser.md) ).

Under the hood, the website user is stored in a php session.



Class synopsis
==============


class <span class="pl-k">WebsiteUserManager</span> implements [LightUserManagerInterface](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/LightUserManagerInterface.md) {

- Properties
    - protected string [$sessionKey](#property-sessionKey) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/__construct.md)() : void
    - public [getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/getUser.md)() : [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md)
    - public [setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/setUser.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user) : void
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
- [WebsiteUserManager::setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/setUser.md) &ndash; Sets the user.
- [WebsiteUserManager::startPhpSession](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/startPhpSession.md) &ndash; Starts the php session if it's not already started.





Location
=============
Ling\Light_UserManager\UserManager\WebsiteUserManager


SeeAlso
==============
Previous class: [LightUserManagerInterface](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/LightUserManagerInterface.md)<br>
