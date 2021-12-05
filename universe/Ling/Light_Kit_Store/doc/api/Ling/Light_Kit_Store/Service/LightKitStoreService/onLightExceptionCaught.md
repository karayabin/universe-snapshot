[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Service\LightKitStoreService class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService.md)


LightKitStoreService::onLightExceptionCaught
================



LightKitStoreService::onLightExceptionCaught — 




Description
================


public [LightKitStoreService::onLightExceptionCaught](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/onLightExceptionCaught.md)(Ling\Light\Events\LightEvent $event) : void




Handles the following light error codes in a special way:

- 404: redirects the user to the "default page" defined in our service (which defaults to 404 page)




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
See the source code for method [LightKitStoreService::onLightExceptionCaught](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Service/LightKitStoreService.php#L298-L338)


See Also
================

The [LightKitStoreService](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService.md) class.

Previous method: [getPasswordProtector](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/getPasswordProtector.md)<br>Next method: [error](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/error.md)<br>

