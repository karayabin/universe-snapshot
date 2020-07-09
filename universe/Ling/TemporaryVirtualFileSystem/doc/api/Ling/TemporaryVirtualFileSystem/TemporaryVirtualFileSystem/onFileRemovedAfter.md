[Back to the Ling/TemporaryVirtualFileSystem api](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem.md)<br>
[Back to the Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystem class](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md)


TemporaryVirtualFileSystem::onFileRemovedAfter
================



TemporaryVirtualFileSystem::onFileRemovedAfter — Hook called after the file has been removed from the virtual file system.




Description
================


protected [TemporaryVirtualFileSystem::onFileRemovedAfter](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/onFileRemovedAfter.md)(string $contextId, string $id, array $op, string $realpath) : void




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
See the source code for method [TemporaryVirtualFileSystem::onFileRemovedAfter](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/TemporaryVirtualFileSystem.php#L615-L618)


See Also
================

The [TemporaryVirtualFileSystem](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md) class.

Previous method: [onFileAddedAfter](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/onFileAddedAfter.md)<br>Next method: [getFileId](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getFileId.md)<br>

