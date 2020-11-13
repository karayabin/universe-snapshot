[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataServiceOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md)


LightUserDataServiceOld::removeAllFilesByResourceIdentifier
================



LightUserDataServiceOld::removeAllFilesByResourceIdentifier — Removes all the files related to the given resource id.




Description
================


public [LightUserDataServiceOld::removeAllFilesByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/removeAllFilesByResourceIdentifier.md)(string $resourceId, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : void




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
See the source code for method [LightUserDataServiceOld::removeAllFilesByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataServiceOld.php#L855-L876)


See Also
================

The [LightUserDataServiceOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md) class.

Previous method: [removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/removeResourceByUrl.md)<br>Next method: [removeUnlinkedResourcesByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/removeUnlinkedResourcesByUser.md)<br>

