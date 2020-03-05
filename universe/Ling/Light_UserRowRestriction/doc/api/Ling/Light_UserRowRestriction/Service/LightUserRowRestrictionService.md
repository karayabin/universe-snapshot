[Back to the Ling/Light_UserRowRestriction api](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction.md)



The LightUserRowRestrictionService class
================
2020-03-03 --> 2020-03-05






Introduction
============

The LightUserRowRestrictionService class.



Class synopsis
==============


class <span class="pl-k">LightUserRowRestrictionService</span> implements [LightDatabaseEventHandlerInterface](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/EventHandler/LightDatabaseEventHandlerInterface.md) {

- Constants
    - public const [MODE_INACTIVE](#constant-MODE_INACTIVE) = 0 ;
    - public const [MODE_STRICT](#constant-MODE_STRICT) = 1 ;
    - public const [MODE_PERMISSIVE](#constant-MODE_PERMISSIVE) = 2 ;

- Properties
    - public static int [$mode](#property-mode) = 0 ;
    - protected [Ling\Light_UserRowRestriction\RowRestrictionHandler\RowRestrictionHandlerInterface[]](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface.md) [$prefix2RowRestrictionsHandlers](#property-prefix2RowRestrictionsHandlers) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/__construct.md)() : void
    - public [registerRowRestrictionHandlerByTablePrefix](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/registerRowRestrictionHandlerByTablePrefix.md)(string $tablePrefix, [Ling\Light_UserRowRestriction\RowRestrictionHandler\RowRestrictionHandlerInterface](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface.md) $handler) : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [handle](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/handle.md)(string $eventName, bool $isSystemCall, ?...$args) : void

}




Properties
=============

- <span id="property-mode"><b>mode</b></span>

    This property holds the mode for this instance.
    See [the Light_UserRowRestriction conception notes](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md) for more details.
    
    

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
- [LightUserRowRestrictionService::handle](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/handle.md) &ndash; Reacts to the given event, which name and args are given.





Location
=============
Ling\Light_UserRowRestriction\Service\LightUserRowRestrictionService<br>
See the source code of [Ling\Light_UserRowRestriction\Service\LightUserRowRestrictionService](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/Service/LightUserRowRestrictionService.php)



SeeAlso
==============
Previous class: [RowRestrictionHandlerInterface](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface.md)<br>
