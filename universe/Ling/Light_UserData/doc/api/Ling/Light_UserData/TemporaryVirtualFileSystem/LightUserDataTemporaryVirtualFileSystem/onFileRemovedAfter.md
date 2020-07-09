[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\TemporaryVirtualFileSystem\LightUserDataTemporaryVirtualFileSystem class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.md)


LightUserDataTemporaryVirtualFileSystem::onFileRemovedAfter
================



LightUserDataTemporaryVirtualFileSystem::onFileRemovedAfter — Hook called after the file has been removed from the virtual file system.




Description
================


protected [LightUserDataTemporaryVirtualFileSystem::onFileRemovedAfter](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/onFileRemovedAfter.md)(string $contextId, string $id, array $op, string $realpath) : void




Hook called after the file has been removed from the virtual file system.

- id: the file identifier
- op: the operation if one was deleted, or null otherwise
- realpath: the realpath of the deleted file if one was deleted, or null otherwise




Parameters
================


- contextId

    

- id

    

- op

    

- realpath

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDataTemporaryVirtualFileSystem::onFileRemovedAfter](https://github.com/lingtalfi/Light_UserData/blob/master/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.php#L260-L267)


See Also
================

The [LightUserDataTemporaryVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.md) class.

Previous method: [onFileAddedAfter](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/onFileAddedAfter.md)<br>Next method: [doGetEntryRealPathByOperation](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/doGetEntryRealPathByOperation.md)<br>

