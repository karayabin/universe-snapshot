Ling/Light_AjaxFileUploadManager
================
2019-08-01 --> 2019-10-31




Table of contents
===========

- [FileUploadController](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Controller/FileUploadController.md) &ndash; The FileUploadController class.
    - [FileUploadController::uploader](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Controller/FileUploadController/uploader.md) &ndash; according to the AjaxFileUpload protocol described in this class description.
    - LightController::__construct &ndash; Builds the LightController instance.
    - LightController::setLight &ndash; Sets the light instance.
- [LightAjaxFileUploadManagerException](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Exception/LightAjaxFileUploadManagerException.md) &ndash; The LightAjaxFileUploadManagerException class.
- [LightAjaxFileUploadManagerService](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService.md) &ndash; The LightAjaxFileUploadManagerService class.
    - [LightAjaxFileUploadManagerService::__construct](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/__construct.md) &ndash; Builds the LightAjaxFileUploadManagerService instance.
    - [LightAjaxFileUploadManagerService::setApplicationDir](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/setApplicationDir.md) &ndash; Sets the applicationDir.
    - [LightAjaxFileUploadManagerService::setContainer](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/setContainer.md) &ndash; Sets the container.
    - [LightAjaxFileUploadManagerService::addActionLists](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/addActionLists.md) &ndash; Adds action lists to this instance.
    - [LightAjaxFileUploadManagerService::addValidationRules](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/addValidationRules.md) &ndash; Adds validation rules to this instance.
    - [LightAjaxFileUploadManagerService::addConfigurationItemsByFile](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/addConfigurationItemsByFile.md) &ndash; Adds the configuration items found in the given file.
    - [LightAjaxFileUploadManagerService::uploadItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/uploadItem.md) &ndash; and return the json array in the form of a php array.
- [LightAjaxFileUploadManagerRenderingUtil](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil.md) &ndash; The LightAjaxFileUploadManagerRenderingUtil class.
    - [LightAjaxFileUploadManagerRenderingUtil::__construct](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/__construct.md) &ndash; Builds the LightAjaxFileUploadManagerRenderingUtil instance.
    - [LightAjaxFileUploadManagerRenderingUtil::setSuffix](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/setSuffix.md) &ndash; Sets the suffix.
    - [LightAjaxFileUploadManagerRenderingUtil::printJavascript](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/printJavascript.md) &ndash; Prints the javascript code necessary to instantiate a fully configured fileUploader js object.
    - [LightAjaxFileUploadManagerRenderingUtil::printField](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/printField.md) &ndash; Prints the html field using the given field array, and assuming the js file uploader client (https://github.com/lingtalfi/jsFileUploader) is used.


Dependencies
============
- [Light](https://github.com/lingtalfi/Light)
- [Light_Logger](https://github.com/lingtalfi/Light_Logger)
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [CSRFTools](https://github.com/lingtalfi/CSRFTools)
- [Light_Database](https://github.com/lingtalfi/Light_Database)
- [Light_UserData](https://github.com/lingtalfi/Light_UserData)
- [Light_UserManager](https://github.com/lingtalfi/Light_UserManager)
- [ThumbnailTools](https://github.com/lingtalfi/ThumbnailTools)


