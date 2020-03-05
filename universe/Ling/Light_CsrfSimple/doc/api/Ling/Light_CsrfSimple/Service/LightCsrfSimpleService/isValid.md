[Back to the Ling/Light_CsrfSimple api](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple.md)<br>
[Back to the Ling\Light_CsrfSimple\Service\LightCsrfSimpleService class](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService.md)


LightCsrfSimpleService::isValid
================



LightCsrfSimpleService::isValid — Returns whether the given token is valid.




Description
================


public [LightCsrfSimpleService::isValid](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/isValid.md)(string $token, ?bool $useOldSlot = false) : bool




Returns whether the given token is valid.
The comparison is executed against the csrf token stored in the new slot by default.
To compare the token against the csrf token stored in the old slot, set the useOldSlot flag to true.




Parameters
================


- token

    

- useOldSlot

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [LightCsrfSimpleService::isValid](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/Service/LightCsrfSimpleService.php#L120-L127)


See Also
================

The [LightCsrfSimpleService](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService.md) class.

Previous method: [regenerate](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/regenerate.md)<br>Next method: [setContainer](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/setContainer.md)<br>

