[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystem class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md)


LightUserDataVirtualFileSystem::removeResourceById
================



LightUserDataVirtualFileSystem::removeResourceById — Removes the file identified by the given resource id.




Description
================


public [LightUserDataVirtualFileSystem::removeResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/removeResourceById.md)(string $resourceId) : void




Removes the file identified by the given resource id.
If the file doesn't exist, the method does nothing and doesn't complain.

Technical details: we try to play nice and we remove the resource from both
the commit.byml file and the virtual file system, to avoid any potential sync problems.




Parameters
================


- resourceId

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDataVirtualFileSystem::removeResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystem.php#L129-L172)


See Also
================

The [LightUserDataVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/setContainer.md)<br>Next method: [reset](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/reset.md)<br>

