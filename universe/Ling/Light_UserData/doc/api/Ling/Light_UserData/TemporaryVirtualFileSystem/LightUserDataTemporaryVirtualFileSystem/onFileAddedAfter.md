[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\TemporaryVirtualFileSystem\LightUserDataTemporaryVirtualFileSystem class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.md)


LightUserDataTemporaryVirtualFileSystem::onFileAddedAfter
================



LightUserDataTemporaryVirtualFileSystem::onFileAddedAfter — Hook called after the file has been added to the virtual file system.




Description
================


protected [LightUserDataTemporaryVirtualFileSystem::onFileAddedAfter](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/onFileAddedAfter.md)(string $contextId, array &$operation, string $path, string $dst, ?array $options = []) : void




Hook called after the file has been added to the virtual file system.


- operation is the entry representing the file operation.
- path is the absolute path to the source file being copied;
- dst is the absolute path to the copied file.




Parameters
================


- contextId

    

- operation

    

- path

    

- dst

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDataTemporaryVirtualFileSystem::onFileAddedAfter](https://github.com/lingtalfi/Light_UserData/blob/master/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.php#L197-L255)


See Also
================

The [LightUserDataTemporaryVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.md) class.

Previous method: [getFileRelativePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/getFileRelativePath.md)<br>Next method: [onFileRemovedAfter](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/onFileRemovedAfter.md)<br>

