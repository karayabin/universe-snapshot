[Back to the Ling/TemporaryVirtualFileSystem api](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem.md)<br>
[Back to the Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystemInterface class](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface.md)


TemporaryVirtualFileSystemInterface::commit
================



TemporaryVirtualFileSystemInterface::commit — Returns the commit list, which is the minimal list of operations to execute to reproduce the operations stored in the given context of this vfs.




Description
================


abstract public [TemporaryVirtualFileSystemInterface::commit](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/commit.md)(string $contextId, ?array $options = []) : array




Returns the commit list, which is the minimal list of operations to execute to reproduce the operations stored in the given context of this vfs.
See the [TemporaryVirtualFileSystem conception notes](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md) for more details.

By default, it also resets the context directory (i.e. remove the directory and its content).
This behaviour can be changed with the options:

- reset: bool=true




Parameters
================


- contextId

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [TemporaryVirtualFileSystemInterface::commit](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/TemporaryVirtualFileSystemInterface.php#L46-L46)


See Also
================

The [TemporaryVirtualFileSystemInterface](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface.md) class.

Previous method: [reset](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/reset.md)<br>Next method: [get](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/get.md)<br>

