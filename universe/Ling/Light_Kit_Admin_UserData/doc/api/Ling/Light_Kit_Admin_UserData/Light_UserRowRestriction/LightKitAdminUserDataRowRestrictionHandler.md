[Back to the Ling/Light_Kit_Admin_UserData api](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData.md)



The LightKitAdminUserDataRowRestrictionHandler class
================
2020-02-28 --> 2021-05-31






Introduction
============

The LightKitAdminUserDataRowRestrictionHandler class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminUserDataRowRestrictionHandler</span> implements [RowRestrictionHandlerInterface](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [checkRestriction](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler/checkRestriction.md)(Ling\Light_User\LightUserInterface $user, string $table, ...$args) : void
    - protected [checkValidWebsiteUser](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler/checkValidWebsiteUser.md)(Ling\Light_User\LightUserInterface $user) : void
    - protected [error](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightKitAdminUserDataRowRestrictionHandler::__construct](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler/__construct.md) &ndash; Builds the LightUserDataRowRestrictionHandler instance.
- [LightKitAdminUserDataRowRestrictionHandler::setContainer](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler/setContainer.md) &ndash; Sets the container.
- [LightKitAdminUserDataRowRestrictionHandler::checkRestriction](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler/checkRestriction.md) &ndash; table and parameters.
- [LightKitAdminUserDataRowRestrictionHandler::checkValidWebsiteUser](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler/checkValidWebsiteUser.md) &ndash; Checks that the given user is a valid LightWebsiteUser, and throws an exception if that's not the case.
- [LightKitAdminUserDataRowRestrictionHandler::error](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler/error.md) &ndash; Throws an exception with the given message.





Location
=============
Ling\Light_Kit_Admin_UserData\Light_UserRowRestriction\LightKitAdminUserDataRowRestrictionHandler<br>
See the source code of [Ling\Light_Kit_Admin_UserData\Light_UserRowRestriction\LightKitAdminUserDataRowRestrictionHandler](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler.php)



SeeAlso
==============
Previous class: [LightKitAdminUserDataPluginInstaller](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_PluginInstaller/LightKitAdminUserDataPluginInstaller.md)<br>Next class: [LightKitAdminUserDataService](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService.md)<br>
