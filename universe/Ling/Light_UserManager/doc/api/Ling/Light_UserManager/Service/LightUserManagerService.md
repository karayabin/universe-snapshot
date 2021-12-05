[Back to the Ling/Light_UserManager api](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager.md)



The LightUserManagerService class
================
2019-05-10 --> 2021-06-24






Introduction
============

The LightUserManagerService class.



Class synopsis
==============


class <span class="pl-k">LightUserManagerService</span> extends [AnyUserManager](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager.md) implements [LightUserManagerInterface](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/LightUserManagerInterface.md) {

- Properties
    - private int|null [$sessionDuration](#property-sessionDuration) ;
    - private array [$prepareUserCallbacks](#property-prepareUserCallbacks) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Service/LightUserManagerService/__construct.md)() : void
    - public [addPrepareUserCallback](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Service/LightUserManagerService/addPrepareUserCallback.md)(callable $callback) : void
    - public [getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Service/LightUserManagerService/getUser.md)() : [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md)
    - public [setSessionDuration](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Service/LightUserManagerService/setSessionDuration.md)(int $sessionDuration) : void

- Inherited methods
    - public [AnyUserManager::destroyUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/destroyUser.md)() : void
    - public [AnyUserManager::setUserClass](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUserClass.md)(string $userClass) : void
    - public [AnyUserManager::getValidWebsiteUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/getValidWebsiteUser.md)() : [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md)
    - public [AnyUserManager::getOpenUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/getOpenUser.md)() : [LightOpenUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser.md)
    - public [AnyUserManager::setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUser.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user) : void
    - public [AnyUserManager::setUserOnce](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUserOnce.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user) : void

}




Properties
=============

- <span id="property-sessionDuration"><b>sessionDuration</b></span>

    Sets the session duration for all users at once, if they are refreshable (i.e. non refreshable users generally don't have session duration property).
    
    Note: if null, we do nothing, so each refreshable user keeps its own session duration.
    
    The default is null.
    
    

- <span id="property-prepareUserCallbacks"><b>prepareUserCallbacks</b></span>

    This property holds the prepareUserCallbacks for this instance.
    Those callbacks are executed at the end of the getUser method.
    
    Thus, each callback gives you the opportunity to prepare the user.
    For instance, you could connect the user automatically if he's got a valid remember_me token.
    
    Each callback takes the user instance as its sole argument.
    
    



Methods
==============

- [LightUserManagerService::__construct](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Service/LightUserManagerService/__construct.md) &ndash; Builds the LightUserManagerService instance.
- [LightUserManagerService::addPrepareUserCallback](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Service/LightUserManagerService/addPrepareUserCallback.md) &ndash; Adds a prepareUser callback.
- [LightUserManagerService::getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Service/LightUserManagerService/getUser.md) &ndash; Returns a light user instance, according to the settings of this instance.
- [LightUserManagerService::setSessionDuration](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Service/LightUserManagerService/setSessionDuration.md) &ndash; Sets the sessionDuration.
- [AnyUserManager::destroyUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/destroyUser.md) &ndash; Destroys the current user, according to the settings of this instance.
- [AnyUserManager::setUserClass](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUserClass.md) &ndash; Sets the userClass.
- [AnyUserManager::getValidWebsiteUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/getValidWebsiteUser.md) &ndash; 
- [AnyUserManager::getOpenUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/getOpenUser.md) &ndash; Returns an open user.
- [AnyUserManager::setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUser.md) &ndash; Sets the user.
- [AnyUserManager::setUserOnce](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUserOnce.md) &ndash; Sets the user only if there is no user in the session.





Location
=============
Ling\Light_UserManager\Service\LightUserManagerService<br>
See the source code of [Ling\Light_UserManager\Service\LightUserManagerService](https://github.com/lingtalfi/Light_UserManager/blob/master/Service/LightUserManagerService.php)



SeeAlso
==============
Previous class: [LightUserManagerException](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Exception/LightUserManagerException.md)<br>Next class: [AnyUserManager](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager.md)<br>
