[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystemOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md)


LightUserDataVirtualFileSystemOld::addRealServerResourceIdToRemoveList
================



LightUserDataVirtualFileSystemOld::addRealServerResourceIdToRemoveList — Adds the given resource id in the **to_remove** section of the commit file.




Description
================


public [LightUserDataVirtualFileSystemOld::addRealServerResourceIdToRemoveList](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/addRealServerResourceIdToRemoveList.md)(string $resourceId) : void




Adds the given resource id in the **to_remove** section of the commit file.
The intent is that the real server deletes this file later when we commit.
See the [Light_UserData conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md) for more details.




Parameters
================


- resourceId

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDataVirtualFileSystemOld::addRealServerResourceIdToRemoveList](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystemOld.php#L187-L197)


See Also
================

The [LightUserDataVirtualFileSystemOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md) class.

Previous method: [removeResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/removeResourceById.md)<br>Next method: [reset](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/reset.md)<br>

