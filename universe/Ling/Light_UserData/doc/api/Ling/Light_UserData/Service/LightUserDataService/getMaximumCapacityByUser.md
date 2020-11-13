[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::getMaximumCapacityByUser
================



LightUserDataService::getMaximumCapacityByUser — Returns the maximum number of bytes that the given user is allowed to use.




Description
================


public [LightUserDataService::getMaximumCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getMaximumCapacityByUser.md)([Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user) : int




Returns the maximum number of bytes that the given user is allowed to use.
Throws an exception if the user is not valid.




Parameters
================


- user

    


Return values
================

Returns int.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::getMaximumCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L400-L415)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [listByDirectory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/listByDirectory.md)<br>Next method: [getCurrentCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getCurrentCapacityByUser.md)<br>

