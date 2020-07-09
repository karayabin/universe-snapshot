[Back to the Ling/TemporaryVirtualFileSystem api](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem.md)<br>
[Back to the Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystem class](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md)


TemporaryVirtualFileSystem::commit
================



TemporaryVirtualFileSystem::commit — Returns the commit list, which is the minimal list of operations to execute to reproduce the operations stored in the given context of this vfs.




Description
================


public [TemporaryVirtualFileSystem::commit](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/commit.md)(string $contextId, ?array $options = []) : array




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
See the source code for method [TemporaryVirtualFileSystem::commit](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/TemporaryVirtualFileSystem.php#L101-L115)


See Also
================

The [TemporaryVirtualFileSystem](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md) class.

Previous method: [reset](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/reset.md)<br>Next method: [get](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/get.md)<br>

