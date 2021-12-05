[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Service\LightKitStoreService class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService.md)


LightKitStoreService::getRecaptchaKey
================



LightKitStoreService::getRecaptchaKey — Returns the recaptcha key corresponding to the given project, or an empty string if nothing matches.




Description
================


public [LightKitStoreService::getRecaptchaKey](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/getRecaptchaKey.md)(string $project, ?bool $isSite = true) : string




Returns the recaptcha key corresponding to the given project, or an empty string if nothing matches.
If isSite is true, the site key is returned, otherwise the secret key is returned.

https://www.google.com/recaptcha/about/




Parameters
================


- project

    

- isSite

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [LightKitStoreService::getRecaptchaKey](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Service/LightKitStoreService.php#L147-L151)


See Also
================

The [LightKitStoreService](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService.md) class.

Previous method: [getOption](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/getOption.md)<br>Next method: [generateUserToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/generateUserToken.md)<br>

