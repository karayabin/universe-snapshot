[Back to the Ling/Light_Events api](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events.md)<br>
[Back to the Ling\Light_Events\Service\LightEventsService class](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService.md)


LightEventsService::onListenerProcessBefore
================



LightEventsService::onListenerProcessBefore — A hook called just before a listener is triggered.




Description
================


protected [LightEventsService::onListenerProcessBefore](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/onListenerProcessBefore.md)($listener, string $event, $data) : void




A hook called just before a listener is triggered.

By default, we log the listener details if the useDebug option is true.

Note: This method was written with the intent to be overridden by the user (i.e you should override this method in a sub-class).



Parameters
================


- listener

    

- event

    

- data

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightEventsService::onListenerProcessBefore](https://github.com/lingtalfi/Light_Events/blob/master/Service/LightEventsService.php#L189-L208)


See Also
================

The [LightEventsService](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService.md) class.

Previous method: [setOptions](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/setOptions.md)<br>

