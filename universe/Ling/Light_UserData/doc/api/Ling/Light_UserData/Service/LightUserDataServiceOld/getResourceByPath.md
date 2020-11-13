[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataServiceOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md)


LightUserDataServiceOld::getResourceByPath
================



LightUserDataServiceOld::getResourceByPath — or returns false if the resource was not found.




Description
================


protected [LightUserDataServiceOld::getResourceByPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceByPath.md)(string $path, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : array | false




Returns the resource item from the database, identified by the given path (relative from the user directory)
and the given user (if null the connected user will be used by default),
or returns false if the resource was not found.



Important: no validation is done on the path (i.e. we trust the input).




Parameters
================


- path

    

- user

    


Return values
================

Returns array | false.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataServiceOld::getResourceByPath](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataServiceOld.php#L1549-L1559)


See Also
================

The [LightUserDataServiceOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md) class.

Previous method: [getUserIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getUserIdentifier.md)<br>Next method: [checkUserMaximumStorageLimit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/checkUserMaximumStorageLimit.md)<br>

