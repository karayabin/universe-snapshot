[Back to the Ling/TemporaryVirtualFileSystem api](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem.md)



The TemporaryVirtualFileSystem class
================
2020-04-17 --> 2020-06-01






Introduction
============

The TemporaryVirtualFileSystem class.

With this class, I store files in [babyYaml](https://github.com/lingtalfi/BabyYaml) files, each context dir looks like this:


- $contextDir/
----- operations.byml
----- files/




The operations.byml file contains the operations to return when the commit method is called (i.e. redundant information
is handled). It's an array of operations, each operation:

- type: string (add|remove|update). The operation type (to execute on the real system).
- id: string. The file identifier.
- path: string. The relative path (from the contextDir's files directory) to the uploaded file
- meta: array. An array of meta containing whatever you want.



Heuristics
-----------

See the heuristic section of the [TemporaryVirtualFileSystem conception notes](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md).

For the **add** operation, in case an add operation already exists with the same id, we update the operation (rather than
rejecting the request).



Class synopsis
==============


abstract class <span class="pl-k">TemporaryVirtualFileSystem</span> implements [TemporaryVirtualFileSystemInterface](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface.md) {

- Properties
    - protected string [$rootDir](#property-rootDir) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/__construct.md)() : void
    - public [setRootDir](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/setRootDir.md)(string $rootDir) : void
    - public [getRootDir](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getRootDir.md)() : string
    - public [reset](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/reset.md)(string $contextId) : mixed
    - public [commit](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/commit.md)(string $contextId, ?array $options = []) : array
    - public [get](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/get.md)(string $contextId, string $id, ?array $options = []) : array
    - public [has](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/has.md)(string $contextId, string $id, ?array $allowedTypes = null) : bool
    - public [add](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/add.md)(string $contextId, string $path, array $meta, ?array $options = []) : array
    - public [remove](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/remove.md)(string $contextId, string $id) : void
    - public [update](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/update.md)(string $contextId, string $id, string $path, array $meta, ?array $options = []) : array
    - protected [addEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/addEntry.md)(string $contextId, string $id, string $path, array $meta, ?array $options = []) : array
    - protected [hasEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/hasEntry.md)(string $contextId, string $id, ?array $allowedTypes = null) : bool
    - protected [removeEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/removeEntry.md)(string $contextId, string $id) : void
    - protected [updateEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/updateEntry.md)(string $contextId, string $id, string $path, array $meta, ?array $options = []) : void
    - protected [getEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getEntry.md)(string $contextId, string $id, ?array $options = []) : array
    - protected [getContextDir](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getContextDir.md)(string $contextId) : string
    - protected [getOperationsFile](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getOperationsFile.md)(string $contextId) : string
    - protected [getRawOperations](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getRawOperations.md)(string $contextId) : array
    - protected [getFileRelativePath](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getFileRelativePath.md)(string $contextId, string $id, string $path, array $meta) : string
    - protected [doGetEntryRealPathByOperation](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/doGetEntryRealPathByOperation.md)(string $contextId, array $operation, ?array $options = []) : string
    - protected [onFileAddedAfter](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/onFileAddedAfter.md)(string $contextId, array &$operation, string $path, string $dst, ?array $options = []) : void
    - protected [onFileRemovedAfter](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/onFileRemovedAfter.md)(string $contextId, string $id, array $op, string $realpath) : void
    - abstract protected [getFileId](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getFileId.md)(string $contextId, string $path, array $meta) : string
    - private [error](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/error.md)(string $msg) : void
    - private [getRealPath](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getRealPath.md)(string $path) : string
    - private [getEntryRealPathByOperation](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getEntryRealPathByOperation.md)(string $contextId, array $operation, ?array $options = []) : string

}




Properties
=============

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    
    



Methods
==============

- [TemporaryVirtualFileSystem::__construct](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/__construct.md) &ndash; Builds the TemporaryVirtualFileSystem instance.
- [TemporaryVirtualFileSystem::setRootDir](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/setRootDir.md) &ndash; Sets the rootDir.
- [TemporaryVirtualFileSystem::getRootDir](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getRootDir.md) &ndash; Returns the root dir path.
- [TemporaryVirtualFileSystem::reset](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/reset.md) &ndash; Resets the virtual file system.
- [TemporaryVirtualFileSystem::commit](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/commit.md) &ndash; Returns the commit list, which is the minimal list of operations to execute to reproduce the operations stored in the given context of this vfs.
- [TemporaryVirtualFileSystem::get](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/get.md) &ndash; Returns the commit list entry attached to the given id in the given context.
- [TemporaryVirtualFileSystem::has](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/has.md) &ndash; Returns whether the server has an entry identified by the given id and contextId.
- [TemporaryVirtualFileSystem::add](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/add.md) &ndash; For more details see the heuristic section of the [TemporaryVirtualFileSystem conception notes](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md).
- [TemporaryVirtualFileSystem::remove](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/remove.md) &ndash; Adds a "remove" operation to the commit list for the given id and context.
- [TemporaryVirtualFileSystem::update](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/update.md) &ndash; and returns the updated entry, similar to the return of the add method's return (see the add method for more info).
- [TemporaryVirtualFileSystem::addEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/addEntry.md) &ndash; Adds an entry to the operations.byml file of the given context, and returns the added entry.
- [TemporaryVirtualFileSystem::hasEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/hasEntry.md) &ndash; Returns whether there is an non-deleted entry found in the the operations.byml file of the given context that matches the given id.
- [TemporaryVirtualFileSystem::removeEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/removeEntry.md) &ndash; Removes the entry from the operations.byml file of the given context that matches the given id.
- [TemporaryVirtualFileSystem::updateEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/updateEntry.md) &ndash; Updates the entry in the operations.byml file of the given context that matches the given id.
- [TemporaryVirtualFileSystem::getEntry](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getEntry.md) &ndash; Returns the entry in the operations.byml file of the given context that matches the given id.
- [TemporaryVirtualFileSystem::getContextDir](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getContextDir.md) &ndash; Returns the context dir for the given context id.
- [TemporaryVirtualFileSystem::getOperationsFile](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getOperationsFile.md) &ndash; Creates the operations.byml file if necessary (for the given context id) and returns its path.
- [TemporaryVirtualFileSystem::getRawOperations](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getRawOperations.md) &ndash; Returns the array of operations, as stored in the operations file.
- [TemporaryVirtualFileSystem::getFileRelativePath](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getFileRelativePath.md) &ndash; Returns the relative path (from the contextDir's files directory) of the uploaded file located by the given path.
- [TemporaryVirtualFileSystem::doGetEntryRealPathByOperation](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/doGetEntryRealPathByOperation.md) &ndash; Returns the realpath of the file associated with the given operation entry.
- [TemporaryVirtualFileSystem::onFileAddedAfter](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/onFileAddedAfter.md) &ndash; Hook called after the file has been added to the virtual file system.
- [TemporaryVirtualFileSystem::onFileRemovedAfter](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/onFileRemovedAfter.md) &ndash; Hook called after the file has been removed from the virtual file system.
- [TemporaryVirtualFileSystem::getFileId](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getFileId.md) &ndash; Returns the file id for the file identified by the given parameters.
- [TemporaryVirtualFileSystem::error](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/error.md) &ndash; Throws an exception.
- [TemporaryVirtualFileSystem::getRealPath](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getRealPath.md) &ndash; Returns the realpath of the given path.
- [TemporaryVirtualFileSystem::getEntryRealPathByOperation](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystem/getEntryRealPathByOperation.md) &ndash; Returns the realpath of the file associated with the given operation entry.





Location
=============
Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystem<br>
See the source code of [Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystem](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/TemporaryVirtualFileSystem.php)



SeeAlso
==============
Previous class: [TemporaryVirtualFileSystemException](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/Exception/TemporaryVirtualFileSystemException.md)<br>Next class: [TemporaryVirtualFileSystemInterface](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/api/Ling/TemporaryVirtualFileSystem/TemporaryVirtualFileSystemInterface.md)<br>
