[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::checkUserMaximumStorageLimit
================



LightUserDataService::checkUserMaximumStorageLimit — be still honored after adding the given number of bytes.




Description
================


protected [LightUserDataService::checkUserMaximumStorageLimit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkUserMaximumStorageLimit.md)(int $nbBytesToAdd, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : void




Checks that the maximum storage capacity limits of the given user will
be still honored after adding the given number of bytes.

If not (if the max storage capacity limit would be violated), then an exception is thrown.




Parameters
================


- nbBytesToAdd

    

- user

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::checkUserMaximumStorageLimit](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L1165-L1178)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [getValidWebsiteUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getValidWebsiteUser.md)<br>Next method: [storeTagsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/storeTagsByResourceId.md)<br>

