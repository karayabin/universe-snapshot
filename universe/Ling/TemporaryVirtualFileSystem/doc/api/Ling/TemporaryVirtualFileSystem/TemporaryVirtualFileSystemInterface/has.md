[Back to the Ling/TemporaryVirtualFileSystem api](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem.md)<br>
[Back to the Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystemInterface class](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface.md)


TemporaryVirtualFileSystemInterface::has
================



TemporaryVirtualFileSystemInterface::has — Returns whether the server has an entry identified by the given id and contextId.




Description
================


abstract public [TemporaryVirtualFileSystemInterface::has](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/has.md)(string $contextId, string $id, ?array $allowedTypes = null) : bool




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
See the source code for method [TemporaryVirtualFileSystemInterface::has](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/TemporaryVirtualFileSystemInterface.php#L76-L76)


See Also
================

The [TemporaryVirtualFileSystemInterface](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface.md) class.

Previous method: [get](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/get.md)<br>Next method: [add](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/add.md)<br>

