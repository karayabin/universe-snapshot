[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::removeUnlinkedResourcesByUser
================



LightUserDataService::removeUnlinkedResourcesByUser — for the user which identifier is given.




Description
================


public [LightUserDataService::removeUnlinkedResourcesByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeUnlinkedResourcesByUser.md)([Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user) : void




Removes the resources on the filesystem that aren't referenced in the database,
for the user which identifier is given.




Parameters
================


- user

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDataService::removeUnlinkedResourcesByUser](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L838-L870)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [removeAllFilesByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeAllFilesByResourceIdentifier.md)<br>Next method: [getResourceUrlByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceUrlByResourceIdentifier.md)<br>

