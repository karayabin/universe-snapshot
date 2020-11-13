[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)<br>
[Back to the Ling\Light_Realform\Service\LightRealformService class](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService.md)


LightRealformService::getCurrentWebsiteUser
================



LightRealformService::getCurrentWebsiteUser — Returns the current valid website user, or throws an exception.




Description
================


public [LightRealformService::getCurrentWebsiteUser](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getCurrentWebsiteUser.md)() : [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md)




Returns the current valid website user, or throws an exception.

Note: for now we use the website user exclusively, but that's an implementation
detail (i.e. not specified anywhere in the docs), and might changed in the future.




Parameters
================

This method has no parameters.


Return values
================

Returns [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealformService::getCurrentWebsiteUser](https://github.com/lingtalfi/Light_Realform/blob/master/Service/LightRealformService.php#L284-L298)


See Also
================

The [LightRealformService](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/setContainer.md)<br>Next method: [getChloroformField](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getChloroformField.md)<br>

