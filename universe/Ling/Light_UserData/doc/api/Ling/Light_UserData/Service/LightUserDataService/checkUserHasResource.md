[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::checkUserHasResource
================



LightUserDataService::checkUserHasResource — Checks that the given user owns the current resource, and throws an exception if that's not the case.




Description
================


public [LightUserDataService::checkUserHasResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkUserHasResource.md)(string $resourceIdentifier, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : void




Checks that the given user owns the current resource, and throws an exception if that's not the case.

If the given user is null, the current valid user will be used by default.




Parameters
================


- resourceIdentifier

    

- user

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::checkUserHasResource](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L328-L333)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [userHasResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/userHasResource.md)<br>Next method: [removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeResourceByUrl.md)<br>

