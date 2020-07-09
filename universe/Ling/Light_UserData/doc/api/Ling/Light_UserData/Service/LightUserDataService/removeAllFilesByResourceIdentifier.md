[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::removeAllFilesByResourceIdentifier
================



LightUserDataService::removeAllFilesByResourceIdentifier — Removes all the files related to the given resource id.




Description
================


public [LightUserDataService::removeAllFilesByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeAllFilesByResourceIdentifier.md)(string $resourceId, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : void




Removes all the files related to the given resource id.

This includes:

- the regular file
- the original file (see the original file section of the [Light_UserData conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md) for more info.
- the related files (see the [related-files.md](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/related-files.md) document for more info)




Parameters
================


- resourceId

    

- user

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDataService::removeAllFilesByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L806-L827)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeResourceByUrl.md)<br>Next method: [removeUnlinkedResourcesByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeUnlinkedResourcesByUser.md)<br>

