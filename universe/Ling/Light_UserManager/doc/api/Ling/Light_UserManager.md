Ling/Light_UserManager
================
2019-05-10 --> 2021-06-24




Table of contents
===========

- [LightUserManagerException](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Exception/LightUserManagerException.md) &ndash; The LightUserManagerException class.
- [LightUserManagerService](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Service/LightUserManagerService.md) &ndash; The LightUserManagerService class.
    - [LightUserManagerService::__construct](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Service/LightUserManagerService/__construct.md) &ndash; Builds the LightUserManagerService instance.
    - [LightUserManagerService::addPrepareUserCallback](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Service/LightUserManagerService/addPrepareUserCallback.md) &ndash; Adds a prepareUser callback.
    - [LightUserManagerService::getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Service/LightUserManagerService/getUser.md) &ndash; Returns a light user instance, according to the settings of this instance.
    - [LightUserManagerService::setSessionDuration](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/Service/LightUserManagerService/setSessionDuration.md) &ndash; Sets the sessionDuration.
    - [AnyUserManager::destroyUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/destroyUser.md) &ndash; Destroys the current user, according to the settings of this instance.
    - [AnyUserManager::setUserClass](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUserClass.md) &ndash; Sets the userClass.
    - [AnyUserManager::getValidWebsiteUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/getValidWebsiteUser.md) &ndash; The getValidWebsiteUser method
    - [AnyUserManager::getOpenUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/getOpenUser.md) &ndash; Returns an open user.
    - [AnyUserManager::setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUser.md) &ndash; Sets the user.
    - [AnyUserManager::setUserOnce](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUserOnce.md) &ndash; Sets the user only if there is no user in the session.
- [AnyUserManager](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager.md) &ndash; The AnyUserManager class.
    - [AnyUserManager::__construct](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/__construct.md) &ndash; Builds the WebsiteUserManager instance.
    - [AnyUserManager::getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/getUser.md) &ndash; Returns a light user instance, according to the settings of this instance.
    - [AnyUserManager::destroyUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/destroyUser.md) &ndash; Destroys the current user, according to the settings of this instance.
    - [AnyUserManager::setUserClass](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUserClass.md) &ndash; Sets the userClass.
    - [AnyUserManager::getValidWebsiteUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/getValidWebsiteUser.md) &ndash; The getValidWebsiteUser method
    - [AnyUserManager::getOpenUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/getOpenUser.md) &ndash; Returns an open user.
    - [AnyUserManager::setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUser.md) &ndash; Sets the user.
    - [AnyUserManager::setUserOnce](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/AnyUserManager/setUserOnce.md) &ndash; Sets the user only if there is no user in the session.
- [DevUserManager](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/DevUserManager.md) &ndash; The DevUserManager class.
    - [DevUserManager::__construct](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/DevUserManager/__construct.md) &ndash; Builds the DevUserManager instance.
    - [DevUserManager::getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/DevUserManager/getUser.md) &ndash; Returns a light user instance, according to the settings of this instance.
    - [DevUserManager::destroyUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/DevUserManager/destroyUser.md) &ndash; Destroys the current user, according to the settings of this instance.
    - [DevUserManager::setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/DevUserManager/setUser.md) &ndash; Sets the user.
- [LightUserManagerInterface](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/LightUserManagerInterface.md) &ndash; The LightUserManagerInterface interface.
    - [LightUserManagerInterface::getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/LightUserManagerInterface/getUser.md) &ndash; Returns a light user instance, according to the settings of this instance.
    - [LightUserManagerInterface::destroyUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/LightUserManagerInterface/destroyUser.md) &ndash; Destroys the current user, according to the settings of this instance.
- [WebsiteUserManager](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager.md) &ndash; The WebsiteUserManager class.
    - [WebsiteUserManager::__construct](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/__construct.md) &ndash; Builds the WebsiteUserManager instance.
    - [WebsiteUserManager::getUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/getUser.md) &ndash; Returns a light user instance, according to the settings of this instance.
    - [WebsiteUserManager::destroyUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/destroyUser.md) &ndash; Destroys the current user, according to the settings of this instance.
    - [WebsiteUserManager::getValidWebsiteUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/getValidWebsiteUser.md) &ndash; The getValidWebsiteUser method
    - [WebsiteUserManager::setUser](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/setUser.md) &ndash; Sets the user.
    - [WebsiteUserManager::setUserOnce](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager/UserManager/WebsiteUserManager/setUserOnce.md) &ndash; Sets the user only if there is no user in the session.


Dependencies
============
- [Light_User](https://github.com/lingtalfi/Light_User)


