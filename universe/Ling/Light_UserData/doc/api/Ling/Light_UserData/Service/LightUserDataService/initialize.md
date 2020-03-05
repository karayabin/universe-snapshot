[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::initialize
================



LightUserDataService::initialize — Listener for the [Light.initialize_2 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).




Description
================


public [LightUserDataService::initialize](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/initialize.md)(Ling\Light\Events\LightEvent $event) : void




Listener for the [Light.initialize_2 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
It will populate the light user data into the tables from the [Light_UserDatabase plugin](https://github.com/lingtalfi/Light_UserDatabase).

This listener depends on Light_UserDatabase plugin being installed first (hence using a level 2 light initializer).
See more details on the [light events page](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).




Parameters
================


- event

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::initialize](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L106-L116)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/__construct.md)<br>Next method: [installDatabase](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/installDatabase.md)<br>

