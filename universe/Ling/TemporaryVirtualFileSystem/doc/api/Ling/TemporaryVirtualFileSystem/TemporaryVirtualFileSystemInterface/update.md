[Back to the Ling/TemporaryVirtualFileSystem api](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem.md)<br>
[Back to the Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystemInterface class](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface.md)


TemporaryVirtualFileSystemInterface::update
================



TemporaryVirtualFileSystemInterface::update — Adds an "update" operation to the commit list for the file identified by the given parameters.




Description
================


abstract public [TemporaryVirtualFileSystemInterface::update](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/update.md)(string $contextId, string $id, string $path, array $meta) : void




Adds an "update" operation to the commit list for the file identified by the given parameters.

For more details see the heuristic section of the [TemporaryVirtualFileSystem conception notes](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md).




Parameters
================


- contextId

    

- id

    

- path

    

- meta

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [TemporaryVirtualFileSystemInterface::update](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/TemporaryVirtualFileSystemInterface.php#L116-L116)


See Also
================

The [TemporaryVirtualFileSystemInterface](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface.md) class.

Previous method: [remove](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/remove.md)<br>

