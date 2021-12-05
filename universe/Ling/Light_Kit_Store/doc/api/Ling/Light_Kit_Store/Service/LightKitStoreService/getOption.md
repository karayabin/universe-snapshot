[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Service\LightKitStoreService class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService.md)


LightKitStoreService::getOption
================



LightKitStoreService::getOption — Returns the option value corresponding to the given key.




Description
================


public [LightKitStoreService::getOption](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/getOption.md)(string $key, ?$default = null, ?bool $throwEx = false) : void




Returns the option value corresponding to the given key.
If the option is not found, the return depends on the throwEx flag:

- if set to true, an exception is thrown
- if set to false, the default value is returned




Parameters
================


- key

    

- default

    

- throwEx

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightKitStoreService::getOption](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Service/LightKitStoreService.php#L123-L132)


See Also
================

The [LightKitStoreService](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService.md) class.

Previous method: [setOptions](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/setOptions.md)<br>Next method: [getRecaptchaKey](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/getRecaptchaKey.md)<br>

