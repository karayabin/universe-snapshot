[Back to the Ling/TemporaryVirtualFileSystem api](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem.md)<br>
[Back to the Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystem class](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md)


TemporaryVirtualFileSystem::has
================



TemporaryVirtualFileSystem::has — Returns whether the server has an entry identified by the given id and contextId.




Description
================


public [TemporaryVirtualFileSystem::has](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/has.md)(string $contextId, string $id, ?array $allowedTypes = null) : bool




Returns whether the server has an entry identified by the given id and contextId.

You can specify in which type to search with the allowedTypes parameter.
By default (with allowedTypes=null) it will search in all entry types.




Parameters
================


- contextId

    

- id

    

- allowedTypes

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [TemporaryVirtualFileSystem::has](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/TemporaryVirtualFileSystem.php#L128-L131)


See Also
================

The [TemporaryVirtualFileSystem](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md) class.

Previous method: [get](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/get.md)<br>Next method: [add](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/add.md)<br>

