[Back to the Ling/TemporaryVirtualFileSystem api](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem.md)<br>
[Back to the Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystem class](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md)


TemporaryVirtualFileSystem::getEntry
================



TemporaryVirtualFileSystem::getEntry — Returns the entry in the operations.byml file of the given context that matches the given id.




Description
================


protected [TemporaryVirtualFileSystem::getEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getEntry.md)(string $contextId, string $id, ?array $options = []) : array




Returns the entry in the operations.byml file of the given context that matches the given id.

The options are:
- realpath: bool=false. If true, the **realpath** entry is added to the returned array, and contains the
         realpath to the file. This only works if the operation type allows it (i.e. not remove).




Parameters
================


- contextId

    

- id

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TemporaryVirtualFileSystem::getEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/TemporaryVirtualFileSystem.php#L473-L493)


See Also
================

The [TemporaryVirtualFileSystem](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md) class.

Previous method: [updateEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/updateEntry.md)<br>Next method: [getContextDir](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getContextDir.md)<br>

