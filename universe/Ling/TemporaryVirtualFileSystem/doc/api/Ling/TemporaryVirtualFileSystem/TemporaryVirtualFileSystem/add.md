[Back to the Ling/TemporaryVirtualFileSystem api](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem.md)<br>
[Back to the Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystem class](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md)


TemporaryVirtualFileSystem::add
================



TemporaryVirtualFileSystem::add — For more details see the heuristic section of the [TemporaryVirtualFileSystem conception notes](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md).




Description
================


public [TemporaryVirtualFileSystem::add](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/add.md)(string $contextId, string $path, array $meta, ?array $options = []) : array




Adds an "add" operation to the commit list for the file identified by the given parameters,
and returns the added entry, which is an array containing at least the following:

- id: string, the id to access the uploaded file
- meta: array, an array of meta information that the application might provide


For more details see the heuristic section of the [TemporaryVirtualFileSystem conception notes](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md).

The options are:
-  move: bool=false. Whether to move or copy the given path to the destination.



You can pass some extra options to the concrete class via this options array.




Parameters
================


- contextId

    

- path

    

- meta

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [TemporaryVirtualFileSystem::add](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/TemporaryVirtualFileSystem.php#L137-L141)


See Also
================

The [TemporaryVirtualFileSystem](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md) class.

Previous method: [has](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/has.md)<br>Next method: [remove](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/remove.md)<br>

