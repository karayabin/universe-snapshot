[Back to the Ling/Light_Nugget api](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget.md)<br>
[Back to the Ling\Light_Nugget\Service\LightNuggetService class](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService.md)


LightNuggetService::checkSecurity
================



LightNuggetService::checkSecurity — Check that the user is granted the permission to execute an action, and throws an exception if that's not the case.




Description
================


public [LightNuggetService::checkSecurity](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/checkSecurity.md)(array $nugget, ?array $params = []) : void




Check that the user is granted the permission to execute an action, and throws an exception if that's not the case.
This system is described in greater details in the [baked in security system section of the Light_Nugget conception notes](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/pages/conception-notes.md#a-baked-in-security-system-for-nugget-users).

The params array is used if you define a custom handler.
Your custom handler defines what the params array should contain.




Parameters
================


- nugget

    

- params

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightNuggetService::checkSecurity](https://github.com/lingtalfi/Light_Nugget/blob/master/Service/LightNuggetService.php#L182-L313)


See Also
================

The [LightNuggetService](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService.md) class.

Previous method: [getNuggetDirective](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/getNuggetDirective.md)<br>Next method: [resolveVariables](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/resolveVariables.md)<br>

