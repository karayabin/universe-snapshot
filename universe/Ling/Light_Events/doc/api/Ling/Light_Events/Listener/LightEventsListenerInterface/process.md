[Back to the Ling/Light_Events api](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events.md)<br>
[Back to the Ling\Light_Events\Listener\LightEventsListenerInterface class](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Listener/LightEventsListenerInterface.md)


LightEventsListenerInterface::process
================



LightEventsListenerInterface::process — Process the given data.




Description
================


abstract public [LightEventsListenerInterface::process](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Listener/LightEventsListenerInterface/process.md)($data, string $event, ?bool &$stopPropagation = false) : mixed




Process the given data.

If the stopPropagation flag is set to true, this will stop the dispatcher and no
other listener will be called.




Parameters
================


- data

    

- event

    The called event.

- stopPropagation

    


Return values
================

Returns mixed.








Source Code
===========
See the source code for method [LightEventsListenerInterface::process](https://github.com/lingtalfi/Light_Events/blob/master/Listener/LightEventsListenerInterface.php#L27-L27)


See Also
================

The [LightEventsListenerInterface](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Listener/LightEventsListenerInterface.md) class.



