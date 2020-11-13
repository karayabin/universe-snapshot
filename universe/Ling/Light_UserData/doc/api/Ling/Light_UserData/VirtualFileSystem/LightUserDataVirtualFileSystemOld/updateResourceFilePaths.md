[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystemOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md)


LightUserDataVirtualFileSystemOld::updateResourceFilePaths
================



LightUserDataVirtualFileSystemOld::updateResourceFilePaths — Renames the files defined in the given oldResource, moves them to where they are defined in the given fileItems array, and updates the oldResource.




Description
================


private [LightUserDataVirtualFileSystemOld::updateResourceFilePaths](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/updateResourceFilePaths.md)(array &$oldResource, array $fileItems, string $userRelPath) : void




Renames the files defined in the given oldResource, moves them to where they are defined in the given fileItems array, and updates the oldResource.

Hints:
- oldResource comes from the commit file
- fileItems comes from the uploadGems config (it can use tags, they will be resolved)




Parameters
================


- oldResource

    

- fileItems

    

- userRelPath

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDataVirtualFileSystemOld::updateResourceFilePaths](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystemOld.php#L740-L791)


See Also
================

The [LightUserDataVirtualFileSystemOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md) class.

Previous method: [removeFilesByResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/removeFilesByResource.md)<br>Next method: [removeFileItemsFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/removeFileItemsFiles.md)<br>

