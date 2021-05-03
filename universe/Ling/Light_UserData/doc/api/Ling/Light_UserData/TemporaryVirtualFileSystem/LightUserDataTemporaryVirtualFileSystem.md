[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataTemporaryVirtualFileSystem class
================
2019-09-27 --> 2021-03-22






Introduction
============

The LightUserDataTemporaryVirtualFileSystem class.

This class knows to handle original files.
The file structure is this:


- $contextDir/
----- operations.byml
----- files/
--------- $fileId
----- original/
--------- $fileId



Class synopsis
==============


class <span class="pl-k">LightUserDataTemporaryVirtualFileSystem</span> extends [TemporaryVirtualFileSystem](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem.md) implements [TemporaryVirtualFileSystemInterface](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Inherited properties
    - protected string [TemporaryVirtualFileSystem::$rootDir](#property-rootDir) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [commit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/commit.md)(string $contextId, ?array $options = []) : array
    - public [getCurrentCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/getCurrentCapacity.md)(string $contextId, ?array $options = []) : int
    - protected [getFileId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/getFileId.md)(string $contextId, string $path, array $meta) : string
    - protected [getFileRelativePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/getFileRelativePath.md)(string $contextId, string $id, string $path, array $meta) : string
    - protected [onFileAddedAfter](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/onFileAddedAfter.md)(string $contextId, array &$operation, string $path, string $dst, ?array $options = []) : void
    - protected [onFileRemovedAfter](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/onFileRemovedAfter.md)(string $contextId, string $id, array $op, string $realpath) : void
    - protected [doGetEntryRealPathByOperation](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/doGetEntryRealPathByOperation.md)(string $contextId, array $operation, ?array $options = []) : string
    - private [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/error.md)(string $msg) : void

- Inherited methods
    - public TemporaryVirtualFileSystem::setRootDir(string $rootDir) : void
    - public TemporaryVirtualFileSystem::getRootDir() : string
    - public TemporaryVirtualFileSystem::reset(string $contextId) : mixed
    - public TemporaryVirtualFileSystem::get(string $contextId, string $id, ?array $options = []) : array
    - public TemporaryVirtualFileSystem::has(string $contextId, string $id, ?array $allowedTypes = null) : bool
    - public TemporaryVirtualFileSystem::add(string $contextId, string $path, array $meta, ?array $options = []) : array
    - public TemporaryVirtualFileSystem::remove(string $contextId, string $id) : void
    - public TemporaryVirtualFileSystem::update(string $contextId, string $id, string $path, array $meta, ?array $options = []) : array
    - protected TemporaryVirtualFileSystem::addEntry(string $contextId, string $id, string $path, array $meta, ?array $options = []) : array
    - protected TemporaryVirtualFileSystem::hasEntry(string $contextId, string $id, ?array $allowedTypes = null) : bool
    - protected TemporaryVirtualFileSystem::removeEntry(string $contextId, string $id) : void
    - protected TemporaryVirtualFileSystem::updateEntry(string $contextId, string $id, string $path, array $meta, ?array $options = []) : void
    - protected TemporaryVirtualFileSystem::getEntry(string $contextId, string $id, ?array $options = []) : array
    - protected TemporaryVirtualFileSystem::getContextDir(string $contextId) : string
    - protected TemporaryVirtualFileSystem::getOperationsFile(string $contextId) : string
    - protected TemporaryVirtualFileSystem::getRawOperations(string $contextId) : array

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    
    



Methods
==============

- [LightUserDataTemporaryVirtualFileSystem::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/__construct.md) &ndash; Builds the LightUserDataTemporaryVirtualFileSystem instance.
- [LightUserDataTemporaryVirtualFileSystem::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/setContainer.md) &ndash; Sets the container.
- [LightUserDataTemporaryVirtualFileSystem::commit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/commit.md) &ndash; Returns the commit list, which is the minimal list of operations to execute to reproduce the operations stored in the given context of this vfs.
- [LightUserDataTemporaryVirtualFileSystem::getCurrentCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/getCurrentCapacity.md) &ndash; Returns the size in bytes of all the files contained in the given context directory.
- [LightUserDataTemporaryVirtualFileSystem::getFileId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/getFileId.md) &ndash; Returns the file id for the file identified by the given parameters.
- [LightUserDataTemporaryVirtualFileSystem::getFileRelativePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/getFileRelativePath.md) &ndash; Returns the relative path (from the contextDir's files directory) of the uploaded file located by the given path.
- [LightUserDataTemporaryVirtualFileSystem::onFileAddedAfter](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/onFileAddedAfter.md) &ndash; Hook called after the file has been added to the virtual file system.
- [LightUserDataTemporaryVirtualFileSystem::onFileRemovedAfter](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/onFileRemovedAfter.md) &ndash; Hook called after the file has been removed from the virtual file system.
- [LightUserDataTemporaryVirtualFileSystem::doGetEntryRealPathByOperation](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/doGetEntryRealPathByOperation.md) &ndash; Returns the realpath of the file associated with the given operation entry.
- [LightUserDataTemporaryVirtualFileSystem::error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/error.md) &ndash; Throws an exception.
- TemporaryVirtualFileSystem::setRootDir &ndash; Sets the rootDir.
- TemporaryVirtualFileSystem::getRootDir &ndash; Returns the root dir path.
- TemporaryVirtualFileSystem::reset &ndash; Resets the virtual file system.
- TemporaryVirtualFileSystem::get &ndash; Returns the commit list entry attached to the given id in the given context.
- TemporaryVirtualFileSystem::has &ndash; Returns whether the server has an entry identified by the given id and contextId.
- TemporaryVirtualFileSystem::add &ndash; For more details see the heuristic section of the [TemporaryVirtualFileSystem conception notes](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md).
- TemporaryVirtualFileSystem::remove &ndash; Adds a "remove" operation to the commit list for the given id and context.
- TemporaryVirtualFileSystem::update &ndash; and returns the updated entry, similar to the return of the add method's return (see the add method for more info).
- TemporaryVirtualFileSystem::addEntry &ndash; Adds an entry to the operations.byml file of the given context, and returns the added entry.
- TemporaryVirtualFileSystem::hasEntry &ndash; Returns whether there is an non-deleted entry found in the the operations.byml file of the given context that matches the given id.
- TemporaryVirtualFileSystem::removeEntry &ndash; Removes the entry from the operations.byml file of the given context that matches the given id.
- TemporaryVirtualFileSystem::updateEntry &ndash; Updates the entry in the operations.byml file of the given context that matches the given id.
- TemporaryVirtualFileSystem::getEntry &ndash; Returns the entry in the operations.byml file of the given context that matches the given id.
- TemporaryVirtualFileSystem::getContextDir &ndash; Returns the context dir for the given context id.
- TemporaryVirtualFileSystem::getOperationsFile &ndash; Creates the operations.byml file if necessary (for the given context id) and returns its path.
- TemporaryVirtualFileSystem::getRawOperations &ndash; Returns the array of operations, as stored in the operations file.





Location
=============
Ling\Light_UserData\TemporaryVirtualFileSystem\LightUserDataTemporaryVirtualFileSystem<br>
See the source code of [Ling\Light_UserData\TemporaryVirtualFileSystem\LightUserDataTemporaryVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.php)



SeeAlso
==============
Previous class: [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)<br>Next class: [LightUserDataVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md)<br>
