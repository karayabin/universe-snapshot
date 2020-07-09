[Back to the Ling/TemporaryVirtualFileSystem api](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem.md)<br>
[Back to the Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystem class](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md)


TemporaryVirtualFileSystem::addEntry
================



TemporaryVirtualFileSystem::addEntry — Adds an entry to the operations.byml file of the given context, and returns the added entry.




Description
================


protected [TemporaryVirtualFileSystem::addEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/addEntry.md)(string $contextId, string $id, string $path, array $meta, ?array $options = []) : array




Adds an entry to the operations.byml file of the given context, and returns the added entry.


The options are (all optional):

- type: string. The possible values are:
     - update: means that the operation is an update for a file that is not registered yet in the vfs (but probably exists
         on the real server)
- move: bool=false. Whether to move or copy the file from the given path to the destination.




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
See the source code for method [TemporaryVirtualFileSystem::addEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/TemporaryVirtualFileSystem.php#L190-L267)


See Also
================

The [TemporaryVirtualFileSystem](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md) class.

Previous method: [update](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/update.md)<br>Next method: [hasEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/hasEntry.md)<br>

