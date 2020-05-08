[Back to the Ling/TemporaryVirtualFileSystem api](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem.md)<br>
[Back to the Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystem class](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md)


TemporaryVirtualFileSystem::updateEntry
================



TemporaryVirtualFileSystem::updateEntry — Updates the entry in the operations.byml file of the given context that matches the given id.




Description
================


protected [TemporaryVirtualFileSystem::updateEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/updateEntry.md)(string $contextId, string $id, string $path, array $meta) : void




Updates the entry in the operations.byml file of the given context that matches the given id.

Throws an exception if the file wasn't found, or in case of problems.




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
See the source code for method [TemporaryVirtualFileSystem::updateEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/TemporaryVirtualFileSystem.php#L318-L365)


See Also
================

The [TemporaryVirtualFileSystem](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md) class.

Previous method: [removeEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/removeEntry.md)<br>Next method: [getEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getEntry.md)<br>

