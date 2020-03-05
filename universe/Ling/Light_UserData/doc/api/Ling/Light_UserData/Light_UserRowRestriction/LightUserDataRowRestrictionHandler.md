[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataRowRestrictionHandler class
================
2019-09-27 --> 2020-03-05






Introduction
============

The LightUserDataRowRestrictionHandler class.



Class synopsis
==============


class <span class="pl-k">LightUserDataRowRestrictionHandler</span> implements [RowRestrictionHandlerInterface](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_UserRowRestriction/LightUserDataRowRestrictionHandler/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_UserRowRestriction/LightUserDataRowRestrictionHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [checkRestriction](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_UserRowRestriction/LightUserDataRowRestrictionHandler/checkRestriction.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user, string $table, string $crudType, ?...$args) : void
    - protected [checkValidWebsiteUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_UserRowRestriction/LightUserDataRowRestrictionHandler/checkValidWebsiteUser.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user) : void
    - protected [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_UserRowRestriction/LightUserDataRowRestrictionHandler/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightUserDataRowRestrictionHandler::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_UserRowRestriction/LightUserDataRowRestrictionHandler/__construct.md) &ndash; Builds the LightUserDataRowRestrictionHandler instance.
- [LightUserDataRowRestrictionHandler::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_UserRowRestriction/LightUserDataRowRestrictionHandler/setContainer.md) &ndash; Sets the container.
- [LightUserDataRowRestrictionHandler::checkRestriction](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_UserRowRestriction/LightUserDataRowRestrictionHandler/checkRestriction.md) &ndash; table, crudType, eventName and args parameters.
- [LightUserDataRowRestrictionHandler::checkValidWebsiteUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_UserRowRestriction/LightUserDataRowRestrictionHandler/checkValidWebsiteUser.md) &ndash; Checks that the given user is a valid WebsiteLightUser, and throws an exception if that's not the case.
- [LightUserDataRowRestrictionHandler::error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_UserRowRestriction/LightUserDataRowRestrictionHandler/error.md) &ndash; Throws an exception with the given message.





Location
=============
Ling\Light_UserData\Light_UserRowRestriction\LightUserDataRowRestrictionHandler<br>
See the source code of [Ling\Light_UserData\Light_UserRowRestriction\LightUserDataRowRestrictionHandler](https://github.com/lingtalfi/Light_UserData/blob/master/Light_UserRowRestriction/LightUserDataRowRestrictionHandler.php)



SeeAlso
==============
Previous class: [LightUserDataException](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Exception/LightUserDataException.md)<br>Next class: [LightUserDataRealformHandlerAliasHelper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Realform/RealformHandlerAliasHelper/LightUserDataRealformHandlerAliasHelper.md)<br>
