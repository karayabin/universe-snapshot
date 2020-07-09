Ling/Light_UploadGems
================
2020-04-13 --> 2020-05-26




Table of contents
===========

- [LightUploadGemsException](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Exception/LightUploadGemsException.md) &ndash; The LightUploadGemsException class.
- [GemHelper](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper.md) &ndash; The GemHelper class.
    - [GemHelper::__construct](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/__construct.md) &ndash; Builds the GemHelper instance.
    - [GemHelper::setConfig](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/setConfig.md) &ndash; Sets the config for this gemHelper.
    - [GemHelper::setContainer](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/setContainer.md) &ndash; Sets the container.
    - [GemHelper::setTags](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/setTags.md) &ndash; Sets an array of tags that will be used in the applyCopies method.
    - [GemHelper::applyNameTransform](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/applyNameTransform.md) &ndash; Applies the defined name transformations to the given filename and returns the transformed filename.
    - [GemHelper::applyNameValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/applyNameValidation.md) &ndash; true if they all pass, or returns the error message returned by the first failing constraint otherwise.
    - [GemHelper::applyValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/applyValidation.md) &ndash; true if they all pass, or returns the error message returned by the first failing constraint otherwise.
    - [GemHelper::applyChunkValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/applyChunkValidation.md) &ndash; true if they all pass, or returns the error message returned by the first failing constraint otherwise.
    - [GemHelper::applyCopies](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/applyCopies.md) &ndash; Make the copies of the file which path was given, based on the defined configuration, and returns the path of the desired copy.
    - [GemHelper::getCustomConfig](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/getCustomConfig.md) &ndash; Returns the custom config array attached to this instance.
    - [GemHelper::getCustomConfigValue](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/getCustomConfigValue.md) &ndash; Returns the custom config value corresponding to the given key.
- [GemHelperInterface](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface.md) &ndash; The GemHelperInterface interface.
    - [GemHelperInterface::setTags](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/setTags.md) &ndash; Sets an array of tags that will be used in the applyCopies method.
    - [GemHelperInterface::getCustomConfig](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/getCustomConfig.md) &ndash; Returns the custom config array attached to this instance.
    - [GemHelperInterface::getCustomConfigValue](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/getCustomConfigValue.md) &ndash; Returns the custom config value corresponding to the given key.
    - [GemHelperInterface::applyNameTransform](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyNameTransform.md) &ndash; Applies the defined name transformations to the given filename and returns the transformed filename.
    - [GemHelperInterface::applyNameValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyNameValidation.md) &ndash; true if they all pass, or returns the error message returned by the first failing constraint otherwise.
    - [GemHelperInterface::applyChunkValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyChunkValidation.md) &ndash; true if they all pass, or returns the error message returned by the first failing constraint otherwise.
    - [GemHelperInterface::applyValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyValidation.md) &ndash; true if they all pass, or returns the error message returned by the first failing constraint otherwise.
    - [GemHelperInterface::applyCopies](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyCopies.md) &ndash; Make the copies of the file which path was given, based on the defined configuration, and returns the path of the desired copy.
- [LightUploadGemsService](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService.md) &ndash; The LightUploadGemsService class.
    - [LightUploadGemsService::__construct](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/__construct.md) &ndash; Builds the LightUploadGemsService instance.
    - [LightUploadGemsService::setContainer](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/setContainer.md) &ndash; Sets the container.
    - [LightUploadGemsService::register](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/register.md) &ndash; Registers the pluginName.
    - [LightUploadGemsService::getHelper](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/getHelper.md) &ndash; Returns a GemHelperInterface associated with the given gemId, or throws an exception otherwise.
    - [LightUploadGemsService::checkPhpFile](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/checkPhpFile.md) &ndash; Checks whether the given php file (usually from $_FILES) is erroneous, and throws an exception if it's the case.
    - [LightUploadGemsService::checkFilename](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/checkFilename.md) &ndash; Checks whether the given filename is valid (i.e.


Dependencies
============
- [Bat](https://github.com/lingtalfi/Bat)
- [Light](https://github.com/lingtalfi/Light)
- [Light_AjaxFileUploadManager](https://github.com/lingtalfi/Light_AjaxFileUploadManager)
- [ThumbnailTools](https://github.com/lingtalfi/ThumbnailTools)
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [PhpFileValidator](https://github.com/lingtalfi/PhpFileValidator)


