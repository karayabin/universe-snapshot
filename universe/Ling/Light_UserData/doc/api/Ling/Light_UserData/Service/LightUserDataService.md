[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataService class
================
2019-09-27 --> 2020-06-23






Introduction
============

The LightUserDataService class.

For more details, refer to the [conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md).



Class synopsis
==============


class <span class="pl-k">LightUserDataService</span> implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md), [PluginPostInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginPostInstallerInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected string [$rootDir](#property-rootDir) ;
    - protected [Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md)|null [$currentUser](#property-currentUser) ;
    - protected string [$obfuscationAlgorithm](#property-obfuscationAlgorithm) ;
    - protected string [$obfuscationSecret](#property-obfuscationSecret) ;
    - protected [Ling\Light_UserData\Api\Custom\CustomLightUserDataApiFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomLightUserDataApiFactory.md) [$factory](#property-factory) ;
    - private string [$directoryKey](#property-directoryKey) ;
    - private string [$originalDirectoryName](#property-originalDirectoryName) ;
    - private [Ling\Light_UserData\FileManager\LightUserDataFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler.md) [$fileManagerProtocolHandler](#property-fileManagerProtocolHandler) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/__construct.md)() : void
    - public [install](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/install.md)() : void
    - public [uninstall](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/uninstall.md)() : void
    - public [isInstalled](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/isInstalled.md)() : bool
    - public [getDependencies](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getDependencies.md)() : array
    - public [registerPostInstallerCallables](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/registerPostInstallerCallables.md)() : array
    - public [onUserGroupCreate](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/onUserGroupCreate.md)(Ling\Light\Events\LightEvent $event) : void
    - public [getFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getFactory.md)() : [CustomLightUserDataApiFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomLightUserDataApiFactory.md)
    - public [list](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/list.md)(?string $directory = null) : array
    - public [save](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/save.md)(?array $meta = [], ?array $options = []) : array
    - public [removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeResourceByUrl.md)(string $url) : void
    - public [removeAllFilesByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeAllFilesByResourceIdentifier.md)(string $resourceId, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : void
    - public [removeUnlinkedResourcesByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeUnlinkedResourcesByUser.md)([Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user) : void
    - public [getResourceUrlByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceUrlByResourceIdentifier.md)(string $resourceIdentifier, ?array $options = []) : string
    - public [getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceInfoByResourceIdentifier.md)(string $resourceIdentifier, ?array $options = []) : array
    - public [getResourceInfoByResourceUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceInfoByResourceUrl.md)(string $url) : array
    - public [getContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getContent.md)(string $path, ?bool $throwEx = true) : string | false
    - public [update2SvpResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/update2SvpResource.md)(string $resource, ?$userOrIdentifier = null) : string
    - public [getMaximumCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getMaximumCapacityByUser.md)([Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user) : int
    - public [getCurrentCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getCurrentCapacityByUser.md)([Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user) : int
    - public [handleFileManagerProtocol](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/handleFileManagerProtocol.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : void
    - public [getFileManagerProtocolHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getFileManagerProtocolHandler.md)() : [LightUserDataFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler.md)
    - public [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [getContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getContainer.md)() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - public [setObfuscationParams](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setObfuscationParams.md)(string $algoName, string $secret) : void
    - public [setRootDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setRootDir.md)(string $rootDir) : void
    - public [getRootDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getRootDir.md)() : string
    - public [setTemporaryUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setTemporaryUser.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user) : void
    - public [unsetTemporaryUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/unsetTemporaryUser.md)() : void
    - public [getUserDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserDir.md)(?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : string
    - public [getValidWebsiteUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getValidWebsiteUser.md)() : [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md)
    - public [getIdentifierByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getIdentifierByUrl.md)(string $url, ?bool $throwEx = true) : string | false
    - public [getNewResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getNewResourceIdentifier.md)() : string
    - protected [getUserIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserIdentifier.md)() : string
    - protected [getResourceByPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceByPath.md)(string $path, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : array | false
    - protected [checkUserMaximumStorageLimit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkUserMaximumStorageLimit.md)(int $nbBytesToAdd, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : void
    - protected [checkPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkPermission.md)(?string $permission = null) : void
    - protected [updateUserGroupHasPluginOptionTable](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/updateUserGroupHasPluginOptionTable.md)() : void
    - private [getUserIdentifierByUserOrIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserIdentifierByUserOrIdentifier.md)($userOrIdentifier) : string
    - private [getOriginalPathFromAbsolutePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getOriginalPathFromAbsolutePath.md)(string $path) : string
    - private [getBaseRelativePathByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getBaseRelativePathByResourceIdentifier.md)(string $resourceId) : string
    - private [checkDirname](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkDirname.md)(string $dirName) : void
    - private [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    
    

- <span id="property-currentUser"><b>currentUser</b></span>

    This property holds the currentUser for this instance.
    
    

- <span id="property-obfuscationAlgorithm"><b>obfuscationAlgorithm</b></span>

    This property holds the obfuscationAlgorithm for this instance.
    
    

- <span id="property-obfuscationSecret"><b>obfuscationSecret</b></span>

    This property holds the obfuscationSecret for this instance.
    
    

- <span id="property-factory"><b>factory</b></span>

    This property holds the factory for this instance.
    
    

- <span id="property-directoryKey"><b>directoryKey</b></span>

    This property holds the directoryKey for this instance.
    
    

- <span id="property-originalDirectoryName"><b>originalDirectoryName</b></span>

    This property holds the originalDirectoryName for this instance.
    
    

- <span id="property-fileManagerProtocolHandler"><b>fileManagerProtocolHandler</b></span>

    This property holds the fileManagerProtocolHandler for this instance.
    
    



Methods
==============

- [LightUserDataService::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/__construct.md) &ndash; Builds the LightUserDataService instance.
- [LightUserDataService::install](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/install.md) &ndash; Installs the plugin in the light application.
- [LightUserDataService::uninstall](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/uninstall.md) &ndash; Uninstalls the plugin.
- [LightUserDataService::isInstalled](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
- [LightUserDataService::getDependencies](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getDependencies.md) &ndash; Returns the array of dependencies.
- [LightUserDataService::registerPostInstallerCallables](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/registerPostInstallerCallables.md) &ndash; Registers all the post installers for this plugin.
- [LightUserDataService::onUserGroupCreate](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/onUserGroupCreate.md) &ndash; Listener for the [Light_Database.on_lud_user_group_create event](https://github.com/lingtalfi/Light_Database/blob/master/personal/mydoc/pages/events.md).
- [LightUserDataService::getFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getFactory.md) &ndash; Returns the Light_UserData factory.
- [LightUserDataService::list](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/list.md) &ndash; Returns the array of the files owned by the current user.
- [LightUserDataService::save](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/save.md) &ndash; Saves the given meta array, and returns an array of information related to the saved file.
- [LightUserDataService::removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeResourceByUrl.md) &ndash; Removes the resource which url is given from the database and the filesystem.
- [LightUserDataService::removeAllFilesByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeAllFilesByResourceIdentifier.md) &ndash; Removes all the files related to the given resource id.
- [LightUserDataService::removeUnlinkedResourcesByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeUnlinkedResourcesByUser.md) &ndash; for the user which identifier is given.
- [LightUserDataService::getResourceUrlByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceUrlByResourceIdentifier.md) &ndash; Returns the url to access the resource identified by the given $resourceIdentifier.
- [LightUserDataService::getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceInfoByResourceIdentifier.md) &ndash; Returns an info array matching the file which resourceIdentifier is given.
- [LightUserDataService::getResourceInfoByResourceUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceInfoByResourceUrl.md) &ndash; Returns the resource info array its given url.
- [LightUserDataService::getContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getContent.md) &ndash; Returns the content of the file of the current user which relative path is given.
- [LightUserDataService::update2SvpResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/update2SvpResource.md) &ndash; Removes the 2svp extension from the given resource, and returns the new resource name.
- [LightUserDataService::getMaximumCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getMaximumCapacityByUser.md) &ndash; Returns the maximum number of bytes that the given user is allowed to use.
- [LightUserDataService::getCurrentCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getCurrentCapacityByUser.md) &ndash; Returns the current storage space used by the given user, in bytes.
- [LightUserDataService::handleFileManagerProtocol](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/handleFileManagerProtocol.md) &ndash; Handles the given [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) action and returns the expected response.
- [LightUserDataService::getFileManagerProtocolHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getFileManagerProtocolHandler.md) &ndash; Returns a prepared instance of the file manager handler.
- [LightUserDataService::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setContainer.md) &ndash; Sets the container.
- [LightUserDataService::getContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getContainer.md) &ndash; Returns the container instance attached to the service.
- [LightUserDataService::setObfuscationParams](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setObfuscationParams.md) &ndash; Sets the obfuscation parameters to use.
- [LightUserDataService::setRootDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setRootDir.md) &ndash; Sets the rootDir.
- [LightUserDataService::getRootDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getRootDir.md) &ndash; Returns the rootDir of this instance.
- [LightUserDataService::setTemporaryUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/setTemporaryUser.md) &ndash; Sets a temporary user.
- [LightUserDataService::unsetTemporaryUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/unsetTemporaryUser.md) &ndash; Unsets the temporary user if any.
- [LightUserDataService::getUserDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserDir.md) &ndash; Returns the directory path of the current user.
- [LightUserDataService::getValidWebsiteUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getValidWebsiteUser.md) &ndash; Returns the [current user](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#current-user), which is a LightWebsiteUser.
- [LightUserDataService::getIdentifierByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getIdentifierByUrl.md) &ndash; Returns the identifier from a given url.
- [LightUserDataService::getNewResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getNewResourceIdentifier.md) &ndash; Returns the resource identifier using the given resource id.
- [LightUserDataService::getUserIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserIdentifier.md) &ndash; Returns the current user identifier, or throws an exception if the user is not valid.
- [LightUserDataService::getResourceByPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceByPath.md) &ndash; or returns false if the resource was not found.
- [LightUserDataService::checkUserMaximumStorageLimit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkUserMaximumStorageLimit.md) &ndash; be still honored after adding the given number of bytes.
- [LightUserDataService::checkPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkPermission.md) &ndash; Checks that the current user has the given permission.
- [LightUserDataService::updateUserGroupHasPluginOptionTable](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/updateUserGroupHasPluginOptionTable.md) &ndash; Makes sure every entry in the lud_user_group table is bound to our plugin's option(s).
- [LightUserDataService::getUserIdentifierByUserOrIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserIdentifierByUserOrIdentifier.md) &ndash; Returns the user identifier from the given userOrIdentifier.
- [LightUserDataService::getOriginalPathFromAbsolutePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getOriginalPathFromAbsolutePath.md) &ndash; 
- [LightUserDataService::getBaseRelativePathByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getBaseRelativePathByResourceIdentifier.md) &ndash; Returns the base relative path from the given resourceId.
- [LightUserDataService::checkDirname](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkDirname.md) &ndash; Returns whether the given dirname is valid.
- [LightUserDataService::error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_UserData\Service\LightUserDataService<br>
See the source code of [Ling\Light_UserData\Service\LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php)



SeeAlso
==============
Previous class: [LightUserDataRealformHandlerAliasHelper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Realform/RealformHandlerAliasHelper/LightUserDataRealformHandlerAliasHelper.md)<br>Next class: [LightUserDataTemporaryVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.md)<br>
