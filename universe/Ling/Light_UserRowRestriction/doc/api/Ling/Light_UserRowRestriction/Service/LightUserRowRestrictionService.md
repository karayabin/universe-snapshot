[Back to the Ling/Light_UserRowRestriction api](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction.md)



The LightUserRowRestrictionService class
================
2020-03-03 --> 2020-12-08






Introduction
============

The LightUserRowRestrictionService class.



Class synopsis
==============


class <span class="pl-k">LightUserRowRestrictionService</span>  {

- Properties
    - protected [Ling\Light_UserRowRestriction\RowRestrictionHandler\RowRestrictionHandlerInterface[]](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface.md) [$prefix2RowRestrictionsHandlers](#property-prefix2RowRestrictionsHandlers) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/__construct.md)() : void
    - public [registerRowRestrictionHandlerByTablePrefix](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/registerRowRestrictionHandlerByTablePrefix.md)(string $tablePrefix, [Ling\Light_UserRowRestriction\RowRestrictionHandler\RowRestrictionHandlerInterface](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface.md) $handler) : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [checkRestrictions](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/checkRestrictions.md)(string $eventName, ?...$args) : void

}




Properties
=============

- <span id="property-prefix2RowRestrictionsHandlers"><b>prefix2RowRestrictionsHandlers</b></span>

    This property holds the $prefix2RowRestrictionsHandlers for this instance.
    An array of table prefix => RowRestrictionHandlerInterface.
    Only one handler is allowed by prefix for now (let plugins figure that out).
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightUserRowRestrictionService::__construct](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/__construct.md) &ndash; Builds the LightUserRowRestrictionService instance.
- [LightUserRowRestrictionService::registerRowRestrictionHandlerByTablePrefix](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/registerRowRestrictionHandlerByTablePrefix.md) &ndash; Registers a row restriction handler, and assigns it to the given table prefix.
- [LightUserRowRestrictionService::setContainer](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/setContainer.md) &ndash; Sets the container.
- [LightUserRowRestrictionService::checkRestrictions](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/checkRestrictions.md) &ndash; Checks that the current user is granted to do the crud operation (eventName argument).





Location
=============
Ling\Light_UserRowRestriction\Service\LightUserRowRestrictionService<br>
See the source code of [Ling\Light_UserRowRestriction\Service\LightUserRowRestrictionService](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/Service/LightUserRowRestrictionService.php)



SeeAlso
==============
Previous class: [RowRestrictionHandlerInterface](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface.md)<br>
