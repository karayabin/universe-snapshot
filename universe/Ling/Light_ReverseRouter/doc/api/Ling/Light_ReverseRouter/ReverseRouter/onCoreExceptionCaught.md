[Back to the Ling/Light_ReverseRouter api](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter.md)<br>
[Back to the Ling\Light_ReverseRouter\ReverseRouter class](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter.md)


ReverseRouter::onCoreExceptionCaught
================



ReverseRouter::onCoreExceptionCaught — This method is the callable triggered on the [Light.on_exception_caught event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).




Description
================


public [ReverseRouter::onCoreExceptionCaught](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter/onCoreExceptionCaught.md)(Ling\Light\Events\LightEvent $event, string $eventName, ?bool &$stopPropagation = false) : void




This method is the callable triggered on the [Light.on_exception_caught event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
If the caught exception is an instance of LightRedirectException, this method sets the httpResponse
 variable (in the given LightEvent instance), to effectively redirect the user.




Parameters
================


- event

    

- eventName

    

- stopPropagation

    


Return values
================

Returns void.


Exceptions thrown
================

- [LightException](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException.md).&nbsp;







Source Code
===========
See the source code for method [ReverseRouter::onCoreExceptionCaught](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/ReverseRouter.php#L114-L123)


See Also
================

The [ReverseRouter](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter.md) class.

Previous method: [getUrl](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter/getUrl.md)<br>

