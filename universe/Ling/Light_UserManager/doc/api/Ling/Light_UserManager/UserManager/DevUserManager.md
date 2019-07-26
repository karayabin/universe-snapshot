[Back to the Ling/Light_UserManager api](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager.md)



The DevUserManager class
================
2019-05-10 --> 2019-07-19






Introduction
============

The DevUserManager class.
This class was created by a dev for a dev.

It just returns the user instance that we provide to it beforehand.



Class synopsis
==============


class <span class="pl-k">DevUserManager</span> implements [LightUserManagerInterface](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/LightUserManagerInterface.md) {

- Properties
    - protected [Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) [$user](#property-user) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/DevUserManager/__construct.md)() : void
    - public [getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/DevUserManager/getUser.md)() : [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md)
    - public [setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/DevUserManager/setUser.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user) : void

}




Properties
=============

- <span id="property-user"><b>user</b></span>

    This property holds the user instance.
    
    



Methods
==============

- [DevUserManager::__construct](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/DevUserManager/__construct.md) &ndash; Builds the DevUserManager instance.
- [DevUserManager::getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/DevUserManager/getUser.md) &ndash; Returns a light user instance, according to the settings of this instance.
- [DevUserManager::setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/DevUserManager/setUser.md) &ndash; Sets the user.





Location
=============
Ling\Light_UserManager\UserManager\DevUserManager<br>
See the source code of [Ling\Light_UserManager\UserManager\DevUserManager](https://github.com/lingtalfi/Light_UserManager/blob/master/UserManager/DevUserManager.php)



SeeAlso
==============
Previous class: [LightUserManagerException](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Exception/LightUserManagerException.md)<br>Next class: [LightUserManagerInterface](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/LightUserManagerInterface.md)<br>
