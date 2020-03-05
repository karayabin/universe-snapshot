[Back to the Ling/Light_MicroPermission api](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission.md)



The LightMicroPermissionDatabaseEventHandler class
================
2019-09-26 --> 2020-03-02






Introduction
============

The LightMicroPermissionDatabaseEventHandler class.



Class synopsis
==============


class <span class="pl-k">LightMicroPermissionDatabaseEventHandler</span> implements [LightDatabaseEventHandlerInterface](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/EventHandler/LightDatabaseEventHandlerInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Light_Database/LightMicroPermissionDatabaseEventHandler/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Light_Database/LightMicroPermissionDatabaseEventHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [handle](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Light_Database/LightMicroPermissionDatabaseEventHandler/handle.md)(string $eventName, ?...$args) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightMicroPermissionDatabaseEventHandler::__construct](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Light_Database/LightMicroPermissionDatabaseEventHandler/__construct.md) &ndash; Builds the LightMicroPermissionDatabaseListener instance.
- [LightMicroPermissionDatabaseEventHandler::setContainer](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Light_Database/LightMicroPermissionDatabaseEventHandler/setContainer.md) &ndash; Sets the container.
- [LightMicroPermissionDatabaseEventHandler::handle](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Light_Database/LightMicroPermissionDatabaseEventHandler/handle.md) &ndash; Reacts to the given event, which name and args are given.





Location
=============
Ling\Light_MicroPermission\Light_Database\LightMicroPermissionDatabaseEventHandler<br>
See the source code of [Ling\Light_MicroPermission\Light_Database\LightMicroPermissionDatabaseEventHandler](https://github.com/lingtalfi/Light_MicroPermission/blob/master/Light_Database/LightMicroPermissionDatabaseEventHandler.php)



SeeAlso
==============
Previous class: [LightMicroPermissionException](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Exception/LightMicroPermissionException.md)<br>Next class: [LightMicroPermissionService](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService.md)<br>
