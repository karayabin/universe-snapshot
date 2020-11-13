[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystem class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md)


LightUserDataVirtualFileSystem::getFileAbsolutePathByRelativePath
================



LightUserDataVirtualFileSystem::getFileAbsolutePathByRelativePath — Returns the absolute path of the file which relative path was given.




Description
================


private [LightUserDataVirtualFileSystem::getFileAbsolutePathByRelativePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getFileAbsolutePathByRelativePath.md)(string $relPath) : string




Returns the absolute path of the file which relative path was given.
Note: we remove traversal dots (if any) from the given relative path.




Parameters
================


- relPath

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [LightUserDataVirtualFileSystem::getFileAbsolutePathByRelativePath](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystem.php#L572-L575)


See Also
================

The [LightUserDataVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md) class.

Previous method: [getCommitListPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getCommitListPath.md)<br>Next method: [getFileItemProperty](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getFileItemProperty.md)<br>

