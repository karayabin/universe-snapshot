[Back to the Ling/Light_Logger api](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger.md)<br>
[Back to the Ling\Light_Logger\Service\LightLoggerService class](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService.md)


LightLoggerService::addListener
================



LightLoggerService::addListener — Registers a listener (callable) for the given $channel(s).




Description
================


public [LightLoggerService::addListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/addListener.md)($channel, $listener, ?array $minus = []) : void




Registers a listener (callable) for the given $channel(s).


If channel is a string, the listener will be subscribing messages for that particular channel.
An array of channels can also be passed, to subscribe to multiple channels at the same time.

If the special channel "*" is specified, the listener will be notified of every message on every channel.
In that case, it's possible to remove some channels from the "*" using the minus argument.
The minus argument is an array of channels to remove from the "*".




Parameters
================


- channel

    

- listener

    

- minus

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightLoggerService::addListener](https://github.com/lingtalfi/Light_Logger/blob/master/Service/LightLoggerService.php#L129-L144)


See Also
================

The [LightLoggerService](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/setContainer.md)<br>Next method: [log](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/log.md)<br>

