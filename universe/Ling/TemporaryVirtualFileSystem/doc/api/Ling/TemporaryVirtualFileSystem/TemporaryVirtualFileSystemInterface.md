[Back to the Ling/TemporaryVirtualFileSystem api](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem.md)



The TemporaryVirtualFileSystemInterface class
================
2020-04-17 --> 2020-04-20






Introduction
============

The TemporaryVirtualFileSystemInterface interface.

See more details in the [temporary virtual file system conception notes](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md).



Class synopsis
==============


abstract class <span class="pl-k">TemporaryVirtualFileSystemInterface</span>  {

- Methods
    - abstract public [getRootDir](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/getRootDir.md)() : string
    - abstract public [reset](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/reset.md)(string $contextId) : mixed
    - abstract public [commit](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/commit.md)(string $contextId) : array
    - abstract public [get](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/get.md)(string $contextId, string $id, ?array $options = []) : array
    - abstract public [has](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/has.md)(string $contextId, string $id, ?array $allowedTypes = null) : bool
    - abstract public [add](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/add.md)(string $contextId, string $path, array $meta) : array
    - abstract public [remove](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/remove.md)(string $contextId, string $id) : void
    - abstract public [update](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/update.md)(string $contextId, string $id, string $path, array $meta) : void

}






Methods
==============

- [TemporaryVirtualFileSystemInterface::getRootDir](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/getRootDir.md) &ndash; Returns the root dir path.
- [TemporaryVirtualFileSystemInterface::reset](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/reset.md) &ndash; Resets the virtual file system.
- [TemporaryVirtualFileSystemInterface::commit](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/commit.md) &ndash; Returns the commit list, which is the minimal list of operations to execute to reproduce the operations stored in the given context of this vfs.
- [TemporaryVirtualFileSystemInterface::get](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/get.md) &ndash; Returns the commit list entry attached to the given id in the given context.
- [TemporaryVirtualFileSystemInterface::has](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/has.md) &ndash; Returns whether the server has an entry identified by the given id and contextId.
- [TemporaryVirtualFileSystemInterface::add](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/add.md) &ndash; For more details see the heuristic section of the [TemporaryVirtualFileSystem conception notes](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md).
- [TemporaryVirtualFileSystemInterface::remove](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/remove.md) &ndash; Adds a "remove" operation to the commit list for the given id and context.
- [TemporaryVirtualFileSystemInterface::update](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/update.md) &ndash; Adds an "update" operation to the commit list for the file identified by the given parameters.





Location
=============
Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystemInterface<br>
See the source code of [Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystemInterface](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/TemporaryVirtualFileSystemInterface.php)



SeeAlso
==============
Previous class: [TemporaryVirtualFileSystem](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md)<br>
