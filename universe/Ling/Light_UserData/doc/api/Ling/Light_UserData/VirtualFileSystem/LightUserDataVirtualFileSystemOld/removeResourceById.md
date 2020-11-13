[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystemOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md)


LightUserDataVirtualFileSystemOld::removeResourceById
================



LightUserDataVirtualFileSystemOld::removeResourceById — Removes the file identified by the given resource id.




Description
================


public [LightUserDataVirtualFileSystemOld::removeResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/removeResourceById.md)(string $resourceId) : void




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
See the source code for method [LightUserDataVirtualFileSystemOld::removeResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystemOld.php#L149-L177)


See Also
================

The [LightUserDataVirtualFileSystemOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md) class.

Previous method: [hasResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/hasResource.md)<br>Next method: [addRealServerResourceIdToRemoveList](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/addRealServerResourceIdToRemoveList.md)<br>

