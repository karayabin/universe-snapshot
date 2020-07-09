[Back to the Ling/TemporaryVirtualFileSystem api](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem.md)<br>
[Back to the Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystemInterface class](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface.md)


TemporaryVirtualFileSystemInterface::update
================



TemporaryVirtualFileSystemInterface::update — and returns the updated entry, similar to the return of the add method's return (see the add method for more info).




Description
================


abstract public [TemporaryVirtualFileSystemInterface::update](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/update.md)(string $contextId, string $id, string $path, array $meta, ?array $options = []) : array




Adds an "update" operation to the commit list for the file identified by the given parameters,
and returns the updated entry, similar to the return of the add method's return (see the add method for more info).

For more details see the heuristic section of the [TemporaryVirtualFileSystem conception notes](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md).

The options are:
-  move: bool=false. Whether to move or copy the given path to the destination.

You can pass some extra options to the concrete class via this options array.

Note: if the given path is null, it means that the binary file didn't change.




Parameters
================


- contextId

    

- id

    

- path

    

- meta

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [TemporaryVirtualFileSystemInterface::update](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/TemporaryVirtualFileSystemInterface.php#L144-L144)


See Also
================

The [TemporaryVirtualFileSystemInterface](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface.md) class.

Previous method: [remove](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/remove.md)<br>

