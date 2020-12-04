[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)<br>
[Back to the Ling\Light_Realform\Service\LightRealformService class](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService.md)


LightRealformService::getDynamicInjectionHandler
================



LightRealformService::getDynamicInjectionHandler — or throws an exception if it's not there.




Description
================


public [LightRealformService::getDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getDynamicInjectionHandler.md)(string $identifier) : [RealformDynamicInjectionHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/RealformDynamicInjectionHandlerInterface.md)




Returns the realform dynamic injection handler associated with the given identifier,
or throws an exception if it's not there.




Parameters
================


- identifier

    


Return values
================

Returns [RealformDynamicInjectionHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/RealformDynamicInjectionHandlerInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealformService::getDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realform/blob/master/Service/LightRealformService.php#L242-L252)


See Also
================

The [LightRealformService](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService.md) class.

Previous method: [registerDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/registerDynamicInjectionHandler.md)<br>Next method: [setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/setContainer.md)<br>

