[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataServiceOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md)


LightUserDataServiceOld::checkUserMaximumStorageLimit
================



LightUserDataServiceOld::checkUserMaximumStorageLimit — be still honored after adding the given number of bytes.




Description
================


protected [LightUserDataServiceOld::checkUserMaximumStorageLimit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/checkUserMaximumStorageLimit.md)(int $nbBytesToAdd, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : void




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
See the source code for method [LightUserDataServiceOld::checkUserMaximumStorageLimit](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataServiceOld.php#L1573-L1586)


See Also
================

The [LightUserDataServiceOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md) class.

Previous method: [getResourceByPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceByPath.md)<br>Next method: [checkPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/checkPermission.md)<br>

