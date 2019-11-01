[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)<br>
[Back to the Ling\Light_Realform\Service\LightRealformService class](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService.md)


LightRealformService::getFormHandler
================



LightRealformService::getFormHandler — Returns the realform handler instance corresponding to the given identifier.




Description
================


public [LightRealformService::getFormHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getFormHandler.md)(string $identifier) : [RealformHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface.md)




Returns the realform handler instance corresponding to the given identifier.

The identifier notation is:

- identifier: {pluginName}.{id}

More info in the [conception notes](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/conception-notes.md).




Parameters
================


- identifier

    


Return values
================

Returns [RealformHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealformService::getFormHandler](https://github.com/lingtalfi/Light_Realform/blob/master/Service/LightRealformService.php#L69-L92)


See Also
================

The [LightRealformService](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/__construct.md)<br>Next method: [registerFormHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/registerFormHandler.md)<br>

