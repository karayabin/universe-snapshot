[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataVirtualFileSystem class
================
2019-09-27 --> 2020-11-12






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


class <span class="pl-k">LightUserDataVirtualFileSystem</span>  {

- Properties
    - protected string [$baseDir](#property-baseDir) ;
    - protected string [$contextId](#property-contextId) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - private array [$_content](#property-_content) ;
    - private array [$_defaultFileCache](#property-_defaultFileCache) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/__construct.md)() : void
    - public [setBaseDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/setBaseDir.md)(string $baseDir) : void
    - public [setContextId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/setContextId.md)(string $contextId) : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [removeResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/removeResourceById.md)(string $resourceId) : void
    - public [reset](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/reset.md)() : void
    - public [getCurrentCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getCurrentCapacity.md)() : int
    - public [add](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/add.md)(array $params) : string
    - private [storeEntry](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/storeEntry.md)(array $params, ?array $options = []) : string
    - public [update](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/update.md)(string $resourceId, array $params) : void
    - public [getSourceFileInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getSourceFileInfoByResourceId.md)(string $resourceId, ?array $options = []) : array
    - private [createCopy](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/createCopy.md)(string $relativePath, string $userRelPath, ?string $fileSrc = null, ?array $options = []) : void
    - private [resolveFilePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/resolveFilePath.md)(string $userRelPath, string $relativePath) : string
    - private [getCommitListContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getCommitListContent.md)() : array
    - private [updateCommitListContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/updateCommitListContent.md)(array $conf) : void
    - private [getCommitListPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getCommitListPath.md)() : string
    - private [getFileAbsolutePathByRelativePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getFileAbsolutePathByRelativePath.md)(string $relPath) : string
    - private [getFileItemProperty](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getFileItemProperty.md)(array $fileItem, string $property) : string
    - private [removeFilesByResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/removeFilesByResource.md)(array $resource) : void
    - private [updateResourceFilePaths](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/updateResourceFilePaths.md)(array &$oldResource, array $fileItems, string $userRelPath) : void
    - private [removeFileItemsFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/removeFileItemsFiles.md)(array $fileItems) : void
    - private [compileInfoByResourceItem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/compileInfoByResourceItem.md)(string $resourceId, array $resourceItem, ?array $options = []) : array
    - private [getFilesDirectory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getFilesDirectory.md)() : string
    - private [isDefaultFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/isDefaultFile.md)(string $resourceIdentifier) : bool
    - private [getConfigId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getConfigId.md)() : string
    - private [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-baseDir"><b>baseDir</b></span>

    This property holds the baseDir for this instance.
    
    

- <span id="property-contextId"><b>contextId</b></span>

    This property holds the contextId for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-_content"><b>_content</b></span>

    This property hold the cache for the commit file.
    
    

- <span id="property-_defaultFileCache"><b>_defaultFileCache</b></span>

    This property holds the cache for default files info.
    
    



Methods
==============

- [LightUserDataVirtualFileSystem::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/__construct.md) &ndash; Builds the LightUserDataVirtualFileSystem instance.
- [LightUserDataVirtualFileSystem::setBaseDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/setBaseDir.md) &ndash; Sets the baseDir.
- [LightUserDataVirtualFileSystem::setContextId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/setContextId.md) &ndash; Sets the contextId.
- [LightUserDataVirtualFileSystem::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/setContainer.md) &ndash; Sets the container.
- [LightUserDataVirtualFileSystem::removeResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/removeResourceById.md) &ndash; Removes the file identified by the given resource id.
- [LightUserDataVirtualFileSystem::reset](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/reset.md) &ndash; Resets the virtual file server for the configured context id.
- [LightUserDataVirtualFileSystem::getCurrentCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getCurrentCapacity.md) &ndash; Returns the current weight of all files uploaded by the user so far.
- [LightUserDataVirtualFileSystem::add](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/add.md) &ndash; Adds a file to the virtual server, updates the commit file accordingly, and returns the resourceId.
- [LightUserDataVirtualFileSystem::storeEntry](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/storeEntry.md) &ndash; Stores an entry in the commit file, either in the to_add section or the to_update section, depending on the given params and options.
- [LightUserDataVirtualFileSystem::update](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/update.md) &ndash; Updates the information of the virtual file identified by the given resourceId in the commit file.
- [LightUserDataVirtualFileSystem::getSourceFileInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getSourceFileInfoByResourceId.md) &ndash; Returns an array of information about the source file identified by the given resource id.
- [LightUserDataVirtualFileSystem::createCopy](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/createCopy.md) &ndash; Creates a copy of the file which source and dest are given, on the virtual server, and returns the resolved relative path (i.e.
- [LightUserDataVirtualFileSystem::resolveFilePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/resolveFilePath.md) &ndash; Extracts the tags out of the given userRelPath, then injects them in the given relativePath and returns the corresponding resolved relative path.
- [LightUserDataVirtualFileSystem::getCommitListContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getCommitListContent.md) &ndash; Returns the configuration contained in the commit list file for the configured contextId.
- [LightUserDataVirtualFileSystem::updateCommitListContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/updateCommitListContent.md) &ndash; Replaces the commit_list.byml content with the given array.
- [LightUserDataVirtualFileSystem::getCommitListPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getCommitListPath.md) &ndash; Returns the absolute path to the commit list file.
- [LightUserDataVirtualFileSystem::getFileAbsolutePathByRelativePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getFileAbsolutePathByRelativePath.md) &ndash; Returns the absolute path of the file which relative path was given.
- [LightUserDataVirtualFileSystem::getFileItemProperty](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getFileItemProperty.md) &ndash; Returns the given property defined in the given file item, or throws an exception otherwise.
- [LightUserDataVirtualFileSystem::removeFilesByResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/removeFilesByResource.md) &ndash; Removes the files on the virtual server, which are bound to the given resource array.
- [LightUserDataVirtualFileSystem::updateResourceFilePaths](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/updateResourceFilePaths.md) &ndash; Renames the files defined in the given oldResource, moves them to where they are defined in the given fileItems array, and updates the oldResource.
- [LightUserDataVirtualFileSystem::removeFileItemsFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/removeFileItemsFiles.md) &ndash; Removes the files defined in the given file items.
- [LightUserDataVirtualFileSystem::compileInfoByResourceItem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/compileInfoByResourceItem.md) &ndash; Returns an array of information from the given resource item.
- [LightUserDataVirtualFileSystem::getFilesDirectory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getFilesDirectory.md) &ndash; Returns the absolute path to the "files" directory for the configured context.
- [LightUserDataVirtualFileSystem::isDefaultFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/isDefaultFile.md) &ndash; Returns whether the file, which resource identifier is given, is a default file.
- [LightUserDataVirtualFileSystem::getConfigId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getConfigId.md) &ndash; Returns the current config id.
- [LightUserDataVirtualFileSystem::error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystem<br>
See the source code of [Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystem.php)



SeeAlso
==============
Previous class: [LightUserDataTemporaryVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.md)<br>
