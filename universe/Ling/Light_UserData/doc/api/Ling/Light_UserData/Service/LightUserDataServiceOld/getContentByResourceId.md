[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataServiceOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md)


LightUserDataServiceOld::getContentByResourceId
================



LightUserDataServiceOld::getContentByResourceId — Returns the content of the file identified by the given resourceId.




Description
================


public [LightUserDataServiceOld::getContentByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getContentByResourceId.md)(string $resourceId, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : string




Returns the content of the file identified by the given resourceId.

This method also can check that the user owns the file, and throws an exception if that's not the case.
This depends on whether the user is passed as an argument.
If the user argument is null or an instance of LightWebsiteUser, then the checking is performed,
otherwise if user=false, no checking will be performed.

If the user is null, the current user will be used.




Parameters
================


- resourceId

    

- user

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataServiceOld::getContentByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataServiceOld.php#L1172-L1191)


See Also
================

The [LightUserDataServiceOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md) class.

Previous method: [getContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getContent.md)<br>Next method: [update2SvpResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/update2SvpResource.md)<br>

