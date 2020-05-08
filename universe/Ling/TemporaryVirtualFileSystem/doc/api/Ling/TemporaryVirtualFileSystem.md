Ling/TemporaryVirtualFileSystem
================
2020-04-17 --> 2020-04-20




Table of contents
===========

- [TemporaryVirtualFileSystemException](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/Exception/TemporaryVirtualFileSystemException.md) &ndash; The TemporaryVirtualFileSystemException class.
- [TemporaryVirtualFileSystem](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md) &ndash; The TemporaryVirtualFileSystem class.
    - [TemporaryVirtualFileSystem::__construct](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/__construct.md) &ndash; Builds the TemporaryVirtualFileSystem instance.
    - [TemporaryVirtualFileSystem::setRootDir](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/setRootDir.md) &ndash; Sets the rootDir.
    - [TemporaryVirtualFileSystem::getRootDir](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getRootDir.md) &ndash; Returns the root dir path.
    - [TemporaryVirtualFileSystem::reset](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/reset.md) &ndash; Resets the virtual file system.
    - [TemporaryVirtualFileSystem::commit](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/commit.md) &ndash; Returns the commit list, which is the minimal list of operations to execute to reproduce the operations stored in the given context of this vfs.
    - [TemporaryVirtualFileSystem::get](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/get.md) &ndash; Returns the commit list entry attached to the given id in the given context.
    - [TemporaryVirtualFileSystem::has](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/has.md) &ndash; Returns whether the server has an entry identified by the given id and contextId.
    - [TemporaryVirtualFileSystem::add](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/add.md) &ndash; For more details see the heuristic section of the [TemporaryVirtualFileSystem conception notes](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md).
    - [TemporaryVirtualFileSystem::remove](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/remove.md) &ndash; Adds a "remove" operation to the commit list for the given id and context.
    - [TemporaryVirtualFileSystem::update](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/update.md) &ndash; Adds an "update" operation to the commit list for the file identified by the given parameters.
- [TemporaryVirtualFileSystemInterface](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface.md) &ndash; The TemporaryVirtualFileSystemInterface interface.
    - [TemporaryVirtualFileSystemInterface::getRootDir](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/getRootDir.md) &ndash; Returns the root dir path.
    - [TemporaryVirtualFileSystemInterface::reset](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/reset.md) &ndash; Resets the virtual file system.
    - [TemporaryVirtualFileSystemInterface::commit](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/commit.md) &ndash; Returns the commit list, which is the minimal list of operations to execute to reproduce the operations stored in the given context of this vfs.
    - [TemporaryVirtualFileSystemInterface::get](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/get.md) &ndash; Returns the commit list entry attached to the given id in the given context.
    - [TemporaryVirtualFileSystemInterface::has](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/has.md) &ndash; Returns whether the server has an entry identified by the given id and contextId.
    - [TemporaryVirtualFileSystemInterface::add](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/add.md) &ndash; For more details see the heuristic section of the [TemporaryVirtualFileSystem conception notes](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md).
    - [TemporaryVirtualFileSystemInterface::remove](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/remove.md) &ndash; Adds a "remove" operation to the commit list for the given id and context.
    - [TemporaryVirtualFileSystemInterface::update](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface/update.md) &ndash; Adds an "update" operation to the commit list for the file identified by the given parameters.


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)


