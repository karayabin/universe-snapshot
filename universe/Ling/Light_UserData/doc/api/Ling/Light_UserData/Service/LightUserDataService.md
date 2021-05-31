[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataService class
================
2019-09-27 --> 2021-05-31






Introduction
============

The LightUserDataService class.

For more details, refer to the [conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md).



Class synopsis
==============


class <span class="pl-k">LightUserDataService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected string [$rootDir](#property-rootDir) ;
    - protected [Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md)|null [$currentUser](#property-currentUser) ;
    - protected [Ling\Light_UserData\Api\Custom\CustomLightUserDataApiFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomLightUserDataApiFactory.md) [$factory](#property-factory) ;
    - protected array [$options](#property-options) ;
    - private [Ling\Light_UserData\FileManager\LightUserDataFileManagerHandlerInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerInterface.md) [$fileManagerProtocolHandler](#property-fileManagerProtocolHandler) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/__construct.md)() : void
    - public [setOptions](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setOptions.md)(array $options) : void
    - public [getOption](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getOption.md)(string $key, ?bool $throwEx = true, ?$default = null) : void
    - public [getFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getFileManagerHandler.md)() : [LightUserDataFileManagerHandlerInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerInterface.md)
    - public [onUserGroupCreate](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/onUserGroupCreate.md)(Ling\Light\Events\LightEvent $event) : void
    - public [getFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getFactory.md)() : [CustomLightUserDataApiFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomLightUserDataApiFactory.md)
    - public [listByDirectory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/listByDirectory.md)(string $directory) : array
    - public [getMaximumCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getMaximumCapacityByUser.md)([Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user) : int
    - public [getCurrentCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getCurrentCapacityByUser.md)([Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user) : int
    - public [checkUserMaxStorageCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkUserMaxStorageCapacity.md)() : void
    - public [userHasResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/userHasResource.md)(string $resourceIdentifier, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : bool
    - public [checkUserHasResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkUserHasResource.md)(string $resourceIdentifier, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : void
    - public [removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeResourceByUrl.md)(string $url) : void
    - public [getResourcePathByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourcePathByResourceIdentifier.md)(string $resourceIdentifier, ?array $options = []) : string
    - public [getFileContentByResourceFileId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getFileContentByResourceFileId.md)(int $resourceFileId) : string
    - public [getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceInfoByResourceIdentifier.md)(string $resourceIdentifier, ?array $options = []) : array | false
    - public [getUrlByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUrlByResourceIdentifier.md)(string $resourceIdentifier, ?array $options = []) : string
    - public [getWebAccessServiceUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getWebAccessServiceUrl.md)() : string
    - public [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [getContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getContainer.md)() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - public [setRootDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setRootDir.md)(string $rootDir) : void
    - public [getRootDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getRootDir.md)() : string
    - public [getUserDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserDir.md)(?$userOrUserIdentifier = null) : string
    - public [createResourceByFileContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/createResourceByFileContent.md)(array $resource, string $fileContent, string $path, ?array $options = []) : string
    - public [createResourceByFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/createResourceByFileItems.md)(array $fileItems, ?array $options = []) : void
    - public [updateResourceByFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/updateResourceByFileItems.md)(string $resourceIdentifier, array $fileItems, ?array $options = []) : void
    - public [getNewResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getNewResourceIdentifier.md)() : string
    - public [getResourceIdentifierByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceIdentifierByUrl.md)(string $url, ?bool $throwEx = true) : string | false
    - protected [getUserIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserIdentifier.md)() : string
    - protected [getValidWebsiteUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getValidWebsiteUser.md)() : [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md)
    - protected [checkUserMaximumStorageLimit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkUserMaximumStorageLimit.md)(int $nbBytesToAdd, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : void
    - private [storeTagsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/storeTagsByResourceId.md)($resourceId, array $tags) : void
    - private [createFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/createFileItems.md)(string $sourcePath, array $fileItems, ?array $options = []) : void
    - private [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    
    

- <span id="property-currentUser"><b>currentUser</b></span>

    This property holds the currentUser for this instance.
    
    

- <span id="property-factory"><b>factory</b></span>

    This property holds the factory for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    

- <span id="property-fileManagerProtocolHandler"><b>fileManagerProtocolHandler</b></span>

    This property holds the fileManagerProtocolHandler for this instance.
    
    



Methods
==============

- [LightUserDataService::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/__construct.md) &ndash; Builds the LightUserDataService instance.
- [LightUserDataService::setOptions](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setOptions.md) &ndash; Sets the options.
- [LightUserDataService::getOption](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getOption.md) &ndash; Returns the option which name is given.
- [LightUserDataService::getFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getFileManagerHandler.md) &ndash; Returns the file manager handler instance used by this service.
- [LightUserDataService::onUserGroupCreate](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/onUserGroupCreate.md) &ndash; Listener for the [Ling.Light_Database.on_lud_user_group_create event](https://github.com/lingtalfi/Light_Database/blob/master/personal/mydoc/pages/events.md).
- [LightUserDataService::getFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getFactory.md) &ndash; Returns the Light_UserData factory.
- [LightUserDataService::listByDirectory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/listByDirectory.md) &ndash; Returns an array of information about the resource files contained in the given directory.
- [LightUserDataService::getMaximumCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getMaximumCapacityByUser.md) &ndash; Returns the maximum number of bytes that the given user is allowed to use.
- [LightUserDataService::getCurrentCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getCurrentCapacityByUser.md) &ndash; Returns the current storage space used by the given user, in bytes.
- [LightUserDataService::checkUserMaxStorageCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkUserMaxStorageCapacity.md) &ndash; Checks that the current user's directory doesn't exceed his/her maximum capacity storage.
- [LightUserDataService::userHasResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/userHasResource.md) &ndash; Returns whether the given user owns the resource which identifier was given.
- [LightUserDataService::checkUserHasResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkUserHasResource.md) &ndash; Checks that the given user owns the current resource, and throws an exception if that's not the case.
- [LightUserDataService::removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeResourceByUrl.md) &ndash; Removes the resource which url was given, if the user owns it.
- [LightUserDataService::getResourcePathByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourcePathByResourceIdentifier.md) &ndash; Returns the absolute path to the source file of the resource which identifier is given.
- [LightUserDataService::getFileContentByResourceFileId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getFileContentByResourceFileId.md) &ndash; Returns the binary content of the file identified by the given resource file id.
- [LightUserDataService::getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceInfoByResourceIdentifier.md) &ndash; Returns a [resource info array](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#the-resource-info-array) for the given resource id, or false if the resource info wasn't found.
- [LightUserDataService::getUrlByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUrlByResourceIdentifier.md) &ndash; Returns the url to access the resource identified by the given $resourceIdentifier.
- [LightUserDataService::getWebAccessServiceUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getWebAccessServiceUrl.md) &ndash; Returns the url of the web access service.
- [LightUserDataService::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setContainer.md) &ndash; Sets the container.
- [LightUserDataService::getContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getContainer.md) &ndash; Returns the container instance attached to the service.
- [LightUserDataService::setRootDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setRootDir.md) &ndash; Sets the rootDir.
- [LightUserDataService::getRootDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getRootDir.md) &ndash; Returns the rootDir of this instance.
- [LightUserDataService::getUserDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserDir.md) &ndash; Returns the absolute path to the directory of the given user.
- [LightUserDataService::createResourceByFileContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/createResourceByFileContent.md) &ndash; Creates the resource, which info is given, and returns the resource identifier of the created item.
- [LightUserDataService::createResourceByFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/createResourceByFileItems.md) &ndash; Creates the resource described by the given fileItems in the database, and returns an info array.
- [LightUserDataService::updateResourceByFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/updateResourceByFileItems.md) &ndash; Updates the resource (in the database) which identifier is given, and which is described by the given fileItems.
- [LightUserDataService::getNewResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getNewResourceIdentifier.md) &ndash; the luda_resource.resouce_identifier value.
- [LightUserDataService::getResourceIdentifierByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceIdentifierByUrl.md) &ndash; Returns the identifier from a given url.
- [LightUserDataService::getUserIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserIdentifier.md) &ndash; Returns the current user identifier, or throws an exception if the user is not valid.
- [LightUserDataService::getValidWebsiteUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getValidWebsiteUser.md) &ndash; Returns the [current user](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#current-user), which is a LightWebsiteUser.
- [LightUserDataService::checkUserMaximumStorageLimit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkUserMaximumStorageLimit.md) &ndash; be still honored after adding the given number of bytes.
- [LightUserDataService::storeTagsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/storeTagsByResourceId.md) &ndash; Creates the tags in the database, and binds them to the resource which id is given.
- [LightUserDataService::createFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/createFileItems.md) &ndash; Creates the given file items on the real server, using the given sourcePath as the source.
- [LightUserDataService::error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_UserData\Service\LightUserDataService<br>
See the source code of [Ling\Light_UserData\Service\LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php)



SeeAlso
==============
Previous class: [LightUserDataRealformHandlerAliasHelper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Realform/RealformHandlerAliasHelper/LightUserDataRealformHandlerAliasHelper.md)<br>Next class: [LightUserDataTemporaryVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.md)<br>
