Ling/Light_AjaxFileUploadManager
================
2019-08-01 --> 2020-11-06




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
    - [LightAjaxFileUploadManagerService::setItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/setItem.md) &ndash; Registers a [configuration item](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/configuration-files.md#the-configuration-item) with the given id.
    - [LightAjaxFileUploadManagerService::addConfigurationItemsByFile](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/addConfigurationItemsByFile.md) &ndash; Adds the [configuration items](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/configuration-files.md#the-configuration-item) found in the given [babyYaml](https://github.com/lingtalfi/BabyYaml) file.
    - [LightAjaxFileUploadManagerService::processItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/processItem.md) &ndash; and return the json array in the form of a php array.
    - [LightAjaxFileUploadManagerService::transformImage](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/transformImage.md) &ndash; and stores it in dstPath.
    - [LightAjaxFileUploadManagerService::getTransformedName](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/getTransformedName.md) &ndash; Transforms the name according to the given nameTransformer, and returns the transformed name.
- [LightAjaxFileUploadManagerRenderingUtil](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil.md) &ndash; The LightAjaxFileUploadManagerRenderingUtil class.
    - [LightAjaxFileUploadManagerRenderingUtil::__construct](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/__construct.md) &ndash; Builds the LightAjaxFileUploadManagerRenderingUtil instance.
    - [LightAjaxFileUploadManagerRenderingUtil::setSuffix](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/setSuffix.md) &ndash; Sets the suffix.
    - [LightAjaxFileUploadManagerRenderingUtil::setContainer](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/setContainer.md) &ndash; Sets the container.
    - [LightAjaxFileUploadManagerRenderingUtil::printJavascript](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/printJavascript.md) &ndash; Prints the javascript code necessary to instantiate a fully configured fileUploader js object.
    - [LightAjaxFileUploadManagerRenderingUtil::printField](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/printField.md) &ndash; Prints the html field using the given field array, and assuming the js file uploader client (https://github.com/lingtalfi/jFileUploader) is used.


Dependencies
============
- [Light](https://github.com/lingtalfi/Light)
- [Light_Events](https://github.com/lingtalfi/Light_Events)
- [Light_Logger](https://github.com/lingtalfi/Light_Logger)
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [Light_CsrfSession](https://github.com/lingtalfi/Light_CsrfSession)
- [Light_Database](https://github.com/lingtalfi/Light_Database)
- [Light_UserData](https://github.com/lingtalfi/Light_UserData)
- [Light_UserManager](https://github.com/lingtalfi/Light_UserManager)
- [ThumbnailTools](https://github.com/lingtalfi/ThumbnailTools)
- [Light_HtmlPageCopilot](https://github.com/lingtalfi/Light_HtmlPageCopilot)
- [JFileUploader](https://github.com/lingtalfi/JFileUploader)


