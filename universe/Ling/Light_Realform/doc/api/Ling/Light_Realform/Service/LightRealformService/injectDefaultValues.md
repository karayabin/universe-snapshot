[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)<br>
[Back to the Ling\Light_Realform\Service\LightRealformService class](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService.md)


LightRealformService::injectDefaultValues
================



LightRealformService::injectDefaultValues — Injects the default values into the given form, based on the given nugget.




Description
================


public [LightRealformService::injectDefaultValues](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/injectDefaultValues.md)(array $nugget, [Ling\Chloroform\Form\Chloroform](https://github.com/lingtalfi/Chloroform) $form, ?array $options = []) : void




Injects the default values into the given form, based on the given nugget.

Available options are:
- ?updateRic: array, the update ric (only if the form is in update mode)
- multiplier: array, the multiplier. See more in [the configuration file section of the Light_Realform conception notes](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/2020/conception-notes.md#the-configuration-file)




Parameters
================


- nugget

    

- form

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealformService::injectDefaultValues](https://github.com/lingtalfi/Light_Realform/blob/master/Service/LightRealformService.php#L878-L911)


See Also
================

The [LightRealformService](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService.md) class.

Previous method: [executeSuccessHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/executeSuccessHandler.md)<br>Next method: [error](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/error.md)<br>

