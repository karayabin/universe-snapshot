[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::getUserDir
================



LightUserDataService::getUserDir — Returns the absolute path to the directory of the given user.




Description
================


public [LightUserDataService::getUserDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserDir.md)(?$userOrUserIdentifier = null) : string




Returns the absolute path to the directory of the given user.

The given user can be one of the following:
- a LightWebsiteUser instance
- an user identifier (lud_user.identifier)
- null, in which case the current user will be used




Parameters
================


- userOrUserIdentifier

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::getUserDir](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L638-L653)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [getRootDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getRootDir.md)<br>Next method: [createResourceByFileContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/createResourceByFileContent.md)<br>

