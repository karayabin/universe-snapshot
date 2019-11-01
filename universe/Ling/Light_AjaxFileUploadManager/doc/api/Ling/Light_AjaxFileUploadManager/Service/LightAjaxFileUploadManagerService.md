[Back to the Ling/Light_AjaxFileUploadManager api](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager.md)



The LightAjaxFileUploadManagerService class
================
2019-08-01 --> 2019-10-31






Introduction
============

The LightAjaxFileUploadManagerService class.



Class synopsis
==============


class <span class="pl-k">LightAjaxFileUploadManagerService</span>  {

- Properties
    - protected array [$actionLists](#property-actionLists) ;
    - protected array [$validationRules](#property-validationRules) ;
    - protected string [$applicationDir](#property-applicationDir) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/__construct.md)() : void
    - public [setApplicationDir](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/setApplicationDir.md)(string $applicationDir) : void
    - public [setContainer](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [addActionLists](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/addActionLists.md)(array $actionLists) : void
    - public [addValidationRules](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/addValidationRules.md)(array $validationRules) : void
    - public [addConfigurationItemsByFile](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/addConfigurationItemsByFile.md)(string $file) : void
    - public [uploadItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/uploadItem.md)(string $id, array $phpFileItem, ?array $params = []) : array
    - protected [validatePhpFileItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/validatePhpFileItem.md)(string $validationRuleName, $parameter, array $phpFileItem, ?string &$errorMessage = null) : bool
    - protected [executeAction](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/executeAction.md)(array $action, array $phpFileItem, string $actionId) : string | null
    - protected [transformImage](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/transformImage.md)(string $srcPath, string $dstPath, string $imageTransformer, string $fileName) : bool
    - protected [getTransformedName](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/getTransformedName.md)(string $name, string $nameTransformer) : string
    - protected [extractFunctionInfo](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/extractFunctionInfo.md)(string $transformer) : array

}




Properties
=============

- <span id="property-actionLists"><b>actionLists</b></span>

    This property holds the actionLists for this instance.
    It's an array of id => actionList.
    Each actionList is an array of action items.
    See the [action list](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/action-list.md) documentation for more details.
    
    

- <span id="property-validationRules"><b>validationRules</b></span>

    This property holds the validationRules for this instance.
    It's an array of id => validationRules.
    Each validationRules is an array of validationRuleName => parameters,
    where the form of parameters depends on the validationRuleName.
    
    See the [validation rules page](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/validation-rules.md) for more details.
    
    

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
- [LightAjaxFileUploadManagerService::addActionLists](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/addActionLists.md) &ndash; Adds action lists to this instance.
- [LightAjaxFileUploadManagerService::addValidationRules](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/addValidationRules.md) &ndash; Adds validation rules to this instance.
- [LightAjaxFileUploadManagerService::addConfigurationItemsByFile](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/addConfigurationItemsByFile.md) &ndash; Adds the configuration items found in the given file.
- [LightAjaxFileUploadManagerService::uploadItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/uploadItem.md) &ndash; and return the json array in the form of a php array.
- [LightAjaxFileUploadManagerService::validatePhpFileItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/validatePhpFileItem.md) &ndash; and return a boolean result.
- [LightAjaxFileUploadManagerService::executeAction](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/executeAction.md) &ndash; depending on the configuration of the given action.
- [LightAjaxFileUploadManagerService::transformImage](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/transformImage.md) &ndash; and stores it in dstPath.
- [LightAjaxFileUploadManagerService::getTransformedName](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/getTransformedName.md) &ndash; Transforms the name according to the given nameTransformer, and returns the transformed name.
- [LightAjaxFileUploadManagerService::extractFunctionInfo](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/extractFunctionInfo.md) &ndash; 





Location
=============
Ling\Light_AjaxFileUploadManager\Service\LightAjaxFileUploadManagerService<br>
See the source code of [Ling\Light_AjaxFileUploadManager\Service\LightAjaxFileUploadManagerService](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/Service/LightAjaxFileUploadManagerService.php)



SeeAlso
==============
Previous class: [LightAjaxFileUploadManagerException](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Exception/LightAjaxFileUploadManagerException.md)<br>Next class: [LightAjaxFileUploadManagerRenderingUtil](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil.md)<br>
