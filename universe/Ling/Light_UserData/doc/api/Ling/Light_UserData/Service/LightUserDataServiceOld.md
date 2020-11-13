[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataServiceOld class
================
2019-09-27 --> 2020-11-09






Introduction
============

The LightUserDataService class.

For more details, refer to the [conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md).



Class synopsis
==============


class <span class="pl-k">LightUserDataServiceOld</span> implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md), [PluginPostInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginPostInstallerInterface.md) {

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
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/__construct.md)() : void
    - public [install](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/install.md)() : void
    - public [uninstall](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/uninstall.md)() : void
    - public [isInstalled](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/isInstalled.md)() : bool
    - public [getDependencies](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getDependencies.md)() : array
    - public [registerPostInstallerCallables](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/registerPostInstallerCallables.md)() : array
    - public [onUserGroupCreate](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/onUserGroupCreate.md)(Ling\Light\Events\LightEvent $event) : void
    - public [getFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getFactory.md)() : [CustomLightUserDataApiFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomLightUserDataApiFactory.md)
    - public [list](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/list.md)(?string $directory = null) : array
    - public [save](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/save.md)(?array $meta = [], ?array $options = []) : array
    - public [removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/removeResourceByUrl.md)(string $url) : void
    - public [removeAllFilesByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/removeAllFilesByResourceIdentifier.md)(string $resourceId, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : void
    - public [removeUnlinkedResourcesByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/removeUnlinkedResourcesByUser.md)([Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user) : void
    - public [getResourceUrlByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceUrlByResourceIdentifier.md)(string $resourceIdentifier, ?array $options = []) : string
    - public [getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceInfoByResourceIdentifier.md)(string $resourceIdentifier, ?array $options = []) : array
    - public [getResourceInfoByResourceUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceInfoByResourceUrl.md)(string $url) : array
    - public [getContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getContent.md)(string $path, ?bool $throwEx = true) : string | false
    - public [getContentByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getContentByResourceId.md)(string $resourceId, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : string
    - public [update2SvpResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/update2SvpResource.md)(string $resource, ?$userOrIdentifier = null) : string
    - public [getMaximumCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getMaximumCapacityByUser.md)([Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user) : int
    - public [getCurrentCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getCurrentCapacityByUser.md)([Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user) : int
    - public [handleFileManagerProtocol](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/handleFileManagerProtocol.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : void
    - public [getFileManagerProtocolHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getFileManagerProtocolHandler.md)() : [LightUserDataFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler.md)
    - public [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [getContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getContainer.md)() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - public [setObfuscationParams](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/setObfuscationParams.md)(string $algoName, string $secret) : void
    - public [setRootDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/setRootDir.md)(string $rootDir) : void
    - public [getRootDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getRootDir.md)() : string
    - public [setTemporaryUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/setTemporaryUser.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user) : void
    - public [unsetTemporaryUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/unsetTemporaryUser.md)() : void
    - public [getUserDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getUserDir.md)(?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : string
    - public [getValidWebsiteUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getValidWebsiteUser.md)() : [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md)
    - public [getIdentifierByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getIdentifierByUrl.md)(string $url, ?bool $throwEx = true) : string | false
    - public [getNewResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getNewResourceIdentifier.md)() : string
    - protected [getUserIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getUserIdentifier.md)() : string
    - protected [getResourceByPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceByPath.md)(string $path, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : array | false
    - protected [checkUserMaximumStorageLimit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/checkUserMaximumStorageLimit.md)(int $nbBytesToAdd, ?[Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) $user = null) : void
    - protected [checkPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/checkPermission.md)(?string $permission = null) : void
    - protected [updateUserGroupHasPluginOptionTable](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/updateUserGroupHasPluginOptionTable.md)() : void
    - private [getUserIdentifierByUserOrIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getUserIdentifierByUserOrIdentifier.md)($userOrIdentifier) : string
    - private [getOriginalPathFromAbsolutePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getOriginalPathFromAbsolutePath.md)(string $path) : string
    - private [getBaseRelativePathByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getBaseRelativePathByResourceIdentifier.md)(string $resourceId) : string
    - private [checkDirname](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/checkDirname.md)(string $dirName) : void
    - private [hasEntryByDirFilename](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/hasEntryByDirFilename.md)(string $dir, string $filename, int $userId) : bool
    - private [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/error.md)(string $msg) : void

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

- [LightUserDataServiceOld::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/__construct.md) &ndash; Builds the LightUserDataService instance.
- [LightUserDataServiceOld::install](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/install.md) &ndash; Installs the plugin in the light application.
- [LightUserDataServiceOld::uninstall](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/uninstall.md) &ndash; Uninstalls the plugin.
- [LightUserDataServiceOld::isInstalled](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
- [LightUserDataServiceOld::getDependencies](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getDependencies.md) &ndash; Returns the array of dependencies.
- [LightUserDataServiceOld::registerPostInstallerCallables](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/registerPostInstallerCallables.md) &ndash; Registers all the post installers for this plugin.
- [LightUserDataServiceOld::onUserGroupCreate](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/onUserGroupCreate.md) &ndash; Listener for the [Light_Database.on_lud_user_group_create event](https://github.com/lingtalfi/Light_Database/blob/master/personal/mydoc/pages/events.md).
- [LightUserDataServiceOld::getFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getFactory.md) &ndash; Returns the Light_UserData factory.
- [LightUserDataServiceOld::list](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/list.md) &ndash; Returns the array of the files owned by the current user.
- [LightUserDataServiceOld::save](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/save.md) &ndash; Saves the given meta array, and returns an array of information related to the saved file.
- [LightUserDataServiceOld::removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/removeResourceByUrl.md) &ndash; Removes the resource which url is given from the database and the filesystem.
- [LightUserDataServiceOld::removeAllFilesByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/removeAllFilesByResourceIdentifier.md) &ndash; Removes all the files related to the given resource id.
- [LightUserDataServiceOld::removeUnlinkedResourcesByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/removeUnlinkedResourcesByUser.md) &ndash; for the user which identifier is given.
- [LightUserDataServiceOld::getResourceUrlByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceUrlByResourceIdentifier.md) &ndash; Returns the url to access the resource identified by the given $resourceIdentifier.
- [LightUserDataServiceOld::getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceInfoByResourceIdentifier.md) &ndash; Returns an info array matching the file which resourceIdentifier is given.
- [LightUserDataServiceOld::getResourceInfoByResourceUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceInfoByResourceUrl.md) &ndash; Returns the resource info array its given url.
- [LightUserDataServiceOld::getContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getContent.md) &ndash; Returns the content of the file of the current user which relative path is given.
- [LightUserDataServiceOld::getContentByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getContentByResourceId.md) &ndash; Returns the content of the file identified by the given resourceId.
- [LightUserDataServiceOld::update2SvpResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/update2SvpResource.md) &ndash; Removes the 2svp extension from the given resource, and returns the new resource name.
- [LightUserDataServiceOld::getMaximumCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getMaximumCapacityByUser.md) &ndash; Returns the maximum number of bytes that the given user is allowed to use.
- [LightUserDataServiceOld::getCurrentCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getCurrentCapacityByUser.md) &ndash; Returns the current storage space used by the given user, in bytes.
- [LightUserDataServiceOld::handleFileManagerProtocol](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/handleFileManagerProtocol.md) &ndash; Handles the given [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) action and returns the expected response.
- [LightUserDataServiceOld::getFileManagerProtocolHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getFileManagerProtocolHandler.md) &ndash; Returns a prepared instance of the file manager handler.
- [LightUserDataServiceOld::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/setContainer.md) &ndash; Sets the container.
- [LightUserDataServiceOld::getContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getContainer.md) &ndash; Returns the container instance attached to the service.
- [LightUserDataServiceOld::setObfuscationParams](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/setObfuscationParams.md) &ndash; Sets the obfuscation parameters to use.
- [LightUserDataServiceOld::setRootDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/setRootDir.md) &ndash; Sets the rootDir.
- [LightUserDataServiceOld::getRootDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getRootDir.md) &ndash; Returns the rootDir of this instance.
- [LightUserDataServiceOld::setTemporaryUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/setTemporaryUser.md) &ndash; Sets a temporary user.
- [LightUserDataServiceOld::unsetTemporaryUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/unsetTemporaryUser.md) &ndash; Unsets the temporary user if any.
- [LightUserDataServiceOld::getUserDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getUserDir.md) &ndash; Returns the directory path of the current user.
- [LightUserDataServiceOld::getValidWebsiteUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getValidWebsiteUser.md) &ndash; Returns the [current user](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#current-user), which is a LightWebsiteUser.
- [LightUserDataServiceOld::getIdentifierByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getIdentifierByUrl.md) &ndash; Returns the identifier from a given url.
- [LightUserDataServiceOld::getNewResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getNewResourceIdentifier.md) &ndash; Returns the resource identifier using the given resource id.
- [LightUserDataServiceOld::getUserIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getUserIdentifier.md) &ndash; Returns the current user identifier, or throws an exception if the user is not valid.
- [LightUserDataServiceOld::getResourceByPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceByPath.md) &ndash; or returns false if the resource was not found.
- [LightUserDataServiceOld::checkUserMaximumStorageLimit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/checkUserMaximumStorageLimit.md) &ndash; be still honored after adding the given number of bytes.
- [LightUserDataServiceOld::checkPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/checkPermission.md) &ndash; Checks that the current user has the given permission.
- [LightUserDataServiceOld::updateUserGroupHasPluginOptionTable](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/updateUserGroupHasPluginOptionTable.md) &ndash; Makes sure every entry in the lud_user_group table is bound to our plugin's option(s).
- [LightUserDataServiceOld::getUserIdentifierByUserOrIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getUserIdentifierByUserOrIdentifier.md) &ndash; Returns the user identifier from the given userOrIdentifier.
- [LightUserDataServiceOld::getOriginalPathFromAbsolutePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getOriginalPathFromAbsolutePath.md) &ndash; 
- [LightUserDataServiceOld::getBaseRelativePathByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getBaseRelativePathByResourceIdentifier.md) &ndash; Returns the base relative path from the given resourceId.
- [LightUserDataServiceOld::checkDirname](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/checkDirname.md) &ndash; Returns whether the given dirname is valid.
- [LightUserDataServiceOld::hasEntryByDirFilename](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/hasEntryByDirFilename.md) &ndash; Returns whether an entry exists for the given dir, filename and userId.
- [LightUserDataServiceOld::error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_UserData\Service\LightUserDataServiceOld<br>
See the source code of [Ling\Light_UserData\Service\LightUserDataServiceOld](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataServiceOld.php)



SeeAlso
==============
Previous class: [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)<br>Next class: [LightUserDataTemporaryVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.md)<br>
