[Back to the Ling/Light_AjaxFileUploadManager api](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager.md)



The LightAjaxFileUploadManagerService class
================
2019-08-01 --> 2021-05-31






Introduction
============

The LightAjaxFileUploadManagerService class.



Class synopsis
==============


class <span class="pl-k">LightAjaxFileUploadManagerService</span>  {

- Properties
    - protected array [$items](#property-items) ;
    - protected string [$applicationDir](#property-applicationDir) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/__construct.md)() : void
    - public [setApplicationDir](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/setApplicationDir.md)(string $applicationDir) : void
    - public [setContainer](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/setItem.md)(string $id, array $item) : void
    - public [addConfigurationItemsByFile](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/addConfigurationItemsByFile.md)(string $file) : void
    - public [processItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/processItem.md)(string $id, ?array $phpFileItem = null, ?array $params = []) : array
    - public [transformImage](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/transformImage.md)(string $srcPath, string $dstPath, string $imageTransformer, string $fileName) : bool
    - public [getTransformedName](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/getTransformedName.md)(string $name, string $nameTransformer) : string
    - protected [validatePhpFileItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/validatePhpFileItem.md)(string $validationRuleName, $parameter, array $phpFileItem, ?string &$errorMessage = null) : bool
    - protected [executeAction](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/executeAction.md)(array $action, $phpFileItem, array $params, string $confItemId) : array | null
    - protected [extractFunctionInfo](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/extractFunctionInfo.md)(string $transformer) : array

}




Properties
=============

- <span id="property-items"><b>items</b></span>

    This property holds the items for this instance.
    It's an array of id => item.
    See the [Light_AjaxFileUploadManager documentation page](https://github.com/lingtalfi/Light_AjaxFileUploadManager) for more details about the item structure.
    
    

- <span id="property-applicationDir"><b>applicationDir</b></span>

    This property holds the applicationDir for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    Note: this property is only required for certain actions, such as db_update.
    However, it's recommended to always instantiate the service with the container, just in case.
    
    



Methods
==============

- [LightAjaxFileUploadManagerService::__construct](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/__construct.md) &ndash; Builds the LightAjaxFileUploadManagerService instance.
- [LightAjaxFileUploadManagerService::setApplicationDir](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/setApplicationDir.md) &ndash; Sets the applicationDir.
- [LightAjaxFileUploadManagerService::setContainer](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/setContainer.md) &ndash; Sets the container.
- [LightAjaxFileUploadManagerService::setItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/setItem.md) &ndash; Registers a [configuration item](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/configuration-files.md#the-configuration-item) with the given id.
- [LightAjaxFileUploadManagerService::addConfigurationItemsByFile](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/addConfigurationItemsByFile.md) &ndash; Adds the [configuration items](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/configuration-files.md#the-configuration-item) found in the given [babyYaml](https://github.com/lingtalfi/BabyYaml) file.
- [LightAjaxFileUploadManagerService::processItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/processItem.md) &ndash; and return the json array in the form of a php array.
- [LightAjaxFileUploadManagerService::transformImage](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/transformImage.md) &ndash; and stores it in dstPath.
- [LightAjaxFileUploadManagerService::getTransformedName](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/getTransformedName.md) &ndash; Transforms the name according to the given nameTransformer, and returns the transformed name.
- [LightAjaxFileUploadManagerService::validatePhpFileItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/validatePhpFileItem.md) &ndash; and return a boolean result.
- [LightAjaxFileUploadManagerService::executeAction](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/executeAction.md) &ndash; and returns an array of successful information in case of success.
- [LightAjaxFileUploadManagerService::extractFunctionInfo](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/extractFunctionInfo.md) &ndash; 





Location
=============
Ling\Light_AjaxFileUploadManager\Service\LightAjaxFileUploadManagerService<br>
See the source code of [Ling\Light_AjaxFileUploadManager\Service\LightAjaxFileUploadManagerService](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/Service/LightAjaxFileUploadManagerService.php)



SeeAlso
==============
Previous class: [LightAjaxFileUploadManagerException](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Exception/LightAjaxFileUploadManagerException.md)<br>Next class: [LightAjaxFileUploadManagerRenderingUtil](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil.md)<br>
