[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystem class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md)


LightUserDataVirtualFileSystem::updateResourceFilePaths
================



LightUserDataVirtualFileSystem::updateResourceFilePaths — Renames the files defined in the given oldResource, moves them to where they are defined in the given fileItems array, and updates the oldResource.




Description
================


private [LightUserDataVirtualFileSystem::updateResourceFilePaths](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/updateResourceFilePaths.md)(array &$oldResource, array $fileItems, string $userRelPath) : void




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
See the source code for method [LightUserDataVirtualFileSystem::updateResourceFilePaths](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystem.php#L625-L676)


See Also
================

The [LightUserDataVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md) class.

Previous method: [removeFilesByResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/removeFilesByResource.md)<br>Next method: [removeFileItemsFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/removeFileItemsFiles.md)<br>

