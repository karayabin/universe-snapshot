[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataVirtualFileSystemOld class
================
2019-09-27 --> 2020-11-10






Introduction
============

The LightUserDataVirtualFileSystem class.


Our filesystem structure looks like this:

- $baseDir:
----- $contextId
--------- commit_list.byml
--------- files/
------------- $relPath



Class synopsis
==============


class <span class="pl-k">LightUserDataVirtualFileSystemOld</span>  {

- Properties
    - protected string [$baseDir](#property-baseDir) ;
    - protected string [$contextId](#property-contextId) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/__construct.md)() : void
    - public [setBaseDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/setBaseDir.md)(string $baseDir) : void
    - public [setContextId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/setContextId.md)(string $contextId) : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [hasResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/hasResource.md)(string $resourceId, ?array $options = []) : bool
    - public [removeResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/removeResourceById.md)(string $resourceId) : void
    - public [addRealServerResourceIdToRemoveList](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/addRealServerResourceIdToRemoveList.md)(string $resourceId) : void
    - public [reset](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/reset.md)() : void
    - public [getCurrentCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getCurrentCapacity.md)() : int
    - public [add](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/add.md)(array $params) : string
    - private [doAdd](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/doAdd.md)(array $params, ?array $options = []) : string
    - public [update](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/update.md)(string $resourceIdentifier, array $params) : void
    - public [getSourceFileInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getSourceFileInfoByResourceId.md)(string $resourceId) : array
    - public [getUpdateInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getUpdateInfoByResourceId.md)(string $resourceId) : array
    - private [createCopy](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/createCopy.md)(string $relativePath, string $userRelPath, ?string $fileSrc = null, ?array $options = []) : void
    - private [resolveFilePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/resolveFilePath.md)(string $userRelPath, string $relativePath) : string
    - private [getCommitListContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getCommitListContent.md)() : array
    - private [updateCommitListContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/updateCommitListContent.md)(array $conf) : void
    - private [getCommitListPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getCommitListPath.md)() : string
    - private [getFileAbsolutePathByRelativePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getFileAbsolutePathByRelativePath.md)(string $relPath) : string
    - private [getFileItemProperty](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getFileItemProperty.md)(array $fileItem, string $property) : string
    - private [getOriginalPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getOriginalPath.md)(string $path) : string
    - private [removeFilesByResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/removeFilesByResource.md)(array $resource) : void
    - private [updateResourceFilePaths](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/updateResourceFilePaths.md)(array &$oldResource, array $fileItems, string $userRelPath) : void
    - private [removeFileItemsFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/removeFileItemsFiles.md)(array $fileItems) : void
    - private [compileInfoByResourceItem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/compileInfoByResourceItem.md)(string $resourceId, array $resourceItem) : array
    - private [getFilesDirectory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getFilesDirectory.md)() : string
    - private [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-baseDir"><b>baseDir</b></span>

    This property holds the baseDir for this instance.
    
    

- <span id="property-contextId"><b>contextId</b></span>

    This property holds the contextId for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightUserDataVirtualFileSystemOld::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/__construct.md) &ndash; Builds the LightUserDataVirtualFileSystem instance.
- [LightUserDataVirtualFileSystemOld::setBaseDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/setBaseDir.md) &ndash; Sets the baseDir.
- [LightUserDataVirtualFileSystemOld::setContextId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/setContextId.md) &ndash; Sets the contextId.
- [LightUserDataVirtualFileSystemOld::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/setContainer.md) &ndash; Sets the container.
- [LightUserDataVirtualFileSystemOld::hasResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/hasResource.md) &ndash; Returns whether this contains the resource identified by the given id.
- [LightUserDataVirtualFileSystemOld::removeResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/removeResourceById.md) &ndash; Removes the file identified by the given resource id.
- [LightUserDataVirtualFileSystemOld::addRealServerResourceIdToRemoveList](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/addRealServerResourceIdToRemoveList.md) &ndash; Adds the given resource id in the **to_remove** section of the commit file.
- [LightUserDataVirtualFileSystemOld::reset](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/reset.md) &ndash; Resets the virtual file server for the configured context id.
- [LightUserDataVirtualFileSystemOld::getCurrentCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getCurrentCapacity.md) &ndash; Returns the current weight of all files uploaded by the user so far.
- [LightUserDataVirtualFileSystemOld::add](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/add.md) &ndash; Adds a file to the virtual server, updates the commit file accordingly, and returns the resourceId.
- [LightUserDataVirtualFileSystemOld::doAdd](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/doAdd.md) &ndash; Like the add method, but with extra options.
- [LightUserDataVirtualFileSystemOld::update](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/update.md) &ndash; Updates the information of the virtual file identified by the given resourceIdentifier in the commit file.
- [LightUserDataVirtualFileSystemOld::getSourceFileInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getSourceFileInfoByResourceId.md) &ndash; Returns an array of information about the source file identified by the given resource id.
- [LightUserDataVirtualFileSystemOld::getUpdateInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getUpdateInfoByResourceId.md) &ndash; Returns information about the to_update resource identified by the given resource id.
- [LightUserDataVirtualFileSystemOld::createCopy](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/createCopy.md) &ndash; Creates a copy of the file which source and dest are given, on the virtual server, and returns the resolved relative path (i.e.
- [LightUserDataVirtualFileSystemOld::resolveFilePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/resolveFilePath.md) &ndash; Extracts the tags out of the given userRelPath, then injects them in the given relativePath and returns the corresponding resolved relative path.
- [LightUserDataVirtualFileSystemOld::getCommitListContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getCommitListContent.md) &ndash; Returns the configuration contained in the commit list file for the configured contextId.
- [LightUserDataVirtualFileSystemOld::updateCommitListContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/updateCommitListContent.md) &ndash; Replaces the commit_list.byml content with the given array.
- [LightUserDataVirtualFileSystemOld::getCommitListPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getCommitListPath.md) &ndash; Returns the absolute path to the commit list file.
- [LightUserDataVirtualFileSystemOld::getFileAbsolutePathByRelativePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getFileAbsolutePathByRelativePath.md) &ndash; Returns the absolute path of the file which relative path was given.
- [LightUserDataVirtualFileSystemOld::getFileItemProperty](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getFileItemProperty.md) &ndash; Returns the given property defined in the given file item, or throws an exception otherwise.
- [LightUserDataVirtualFileSystemOld::getOriginalPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getOriginalPath.md) &ndash; Returns the path to the original (image) of the given path.
- [LightUserDataVirtualFileSystemOld::removeFilesByResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/removeFilesByResource.md) &ndash; Removes the files on the virtual server, which are bound to the given resource array.
- [LightUserDataVirtualFileSystemOld::updateResourceFilePaths](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/updateResourceFilePaths.md) &ndash; Renames the files defined in the given oldResource, moves them to where they are defined in the given fileItems array, and updates the oldResource.
- [LightUserDataVirtualFileSystemOld::removeFileItemsFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/removeFileItemsFiles.md) &ndash; Removes the files defined in the given file items.
- [LightUserDataVirtualFileSystemOld::compileInfoByResourceItem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/compileInfoByResourceItem.md) &ndash; Returns an array of information from the given resource item.
- [LightUserDataVirtualFileSystemOld::getFilesDirectory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getFilesDirectory.md) &ndash; Returns the absolute path to the "files" directory for the configured context.
- [LightUserDataVirtualFileSystemOld::error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystemOld<br>
See the source code of [Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystemOld](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystemOld.php)



SeeAlso
==============
Previous class: [LightUserDataVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md)<br>
