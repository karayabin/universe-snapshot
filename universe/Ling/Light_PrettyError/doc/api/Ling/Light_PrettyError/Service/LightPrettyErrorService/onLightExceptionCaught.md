[Back to the Ling/Light_PrettyError api](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError.md)<br>
[Back to the Ling\Light_PrettyError\Service\LightPrettyErrorService class](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Service/LightPrettyErrorService.md)


LightPrettyErrorService::onLightExceptionCaught
================



LightPrettyErrorService::onLightExceptionCaught — This method is a callable to execute when the [Ling.Light.on_exception_caught event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md) is triggered.




Description
================


public [LightPrettyErrorService::onLightExceptionCaught](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Service/LightPrettyErrorService/onLightExceptionCaught.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void




This method is a callable to execute when the [Ling.Light.on_exception_caught event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md) is triggered.
It will basically try to return a prettier exception response (rather than the awful default debugging blank screen).




Parameters
================


- event

    

- eventName

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightPrettyErrorService::onLightExceptionCaught](https://github.com/lingtalfi/Light_PrettyError/blob/master/Service/LightPrettyErrorService.php#L54-L88)


See Also
================

The [LightPrettyErrorService](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Service/LightPrettyErrorService.md) class.

Previous method: [renderPage](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Service/LightPrettyErrorService/renderPage.md)<br>

