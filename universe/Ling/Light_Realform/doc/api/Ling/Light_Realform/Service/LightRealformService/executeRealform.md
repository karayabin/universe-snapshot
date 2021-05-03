[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)<br>
[Back to the Ling\Light_Realform\Service\LightRealformService class](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService.md)


LightRealformService::executeRealform
================



LightRealformService::executeRealform — instance.




Description
================


public [LightRealformService::executeRealform](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/executeRealform.md)(string $nuggetId, ?array $options = []) : [RealformResult](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Result/RealformResult.md)




Creates the chloroform from the config nugget identified by the given nuggetId,
then execute our [form handling system a algorithm](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/conception-notes.md#form-handling-system-a), and returns the chloroform
instance.


More info in the [Light_Realform conception notes](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/conception-notes.md).


Available options are:
- onSuccess: callable (array validPostedData).
     See more info in the [Light_Realform conception notes](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/conception-notes.md).




Parameters
================


- nuggetId

    

- options

    


Return values
================

Returns [RealformResult](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Result/RealformResult.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealformService::executeRealform](https://github.com/lingtalfi/Light_Realform/blob/master/Service/LightRealformService.php#L199-L222)


See Also
================

The [LightRealformService](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService.md) class.

Previous method: [getChloroformByConfiguration](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getChloroformByConfiguration.md)<br>Next method: [registerDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/registerDynamicInjectionHandler.md)<br>

