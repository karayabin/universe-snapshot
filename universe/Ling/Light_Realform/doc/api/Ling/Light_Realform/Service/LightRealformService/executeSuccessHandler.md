[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)<br>
[Back to the Ling\Light_Realform\Service\LightRealformService class](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService.md)


LightRealformService::executeSuccessHandler
================



LightRealformService::executeSuccessHandler — Executes the success handler defined in the given nugget.




Description
================


public [LightRealformService::executeSuccessHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/executeSuccessHandler.md)(array $nugget, array $data, ?array $options = []) : void




Executes the success handler defined in the given nugget.

Available options are:

- multiplier: the multiplier (if any) for this form. See the **handleFormSystemA** method of this class for more details
- updateRic: array, the updateRic values; only useful if the form is in update mode




Parameters
================


- nugget

    

- data

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealformService::executeSuccessHandler](https://github.com/lingtalfi/Light_Realform/blob/master/Service/LightRealformService.php#L774-L819)


See Also
================

The [LightRealformService](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService.md) class.

Previous method: [handleFormSystemA](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/handleFormSystemA.md)<br>Next method: [getFeederDefaultValues](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getFeederDefaultValues.md)<br>

