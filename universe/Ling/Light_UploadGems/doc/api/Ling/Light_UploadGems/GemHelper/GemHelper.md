[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)



The GemHelper class
================
2020-04-13 --> 2020-11-06






Introduction
============

The GemHelper class.



Class synopsis
==============


class <span class="pl-k">GemHelper</span>  {

- Properties
    - protected array [$config](#property-config) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$tags](#property-tags) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/__construct.md)() : void
    - public [setConfig](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/setConfig.md)(array $config) : void
    - public [setContainer](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setTags](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/setTags.md)(array $tags) : void
    - public [applyNameTransform](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/applyNameTransform.md)(string $filename) : string
    - public [applyNameValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/applyNameValidation.md)(string $filename) : true | string
    - public [applyValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/applyValidation.md)(string $path) : true | string
    - public [applyChunkValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/applyChunkValidation.md)(string $path) : true | string
    - public [applyCopies](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/applyCopies.md)(string $path, ?array $options = []) : string
    - public [getCustomConfig](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/getCustomConfig.md)() : array
    - public [getCustomConfigValue](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/getCustomConfigValue.md)(string $key, ?bool $throwEx = true) : mixed
    - private [executeNameValidationRule](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/executeNameValidationRule.md)(string $validationRuleName, $parameter, string $filename, ?string &$errorMessage = null) : bool
    - private [executeValidationRule](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/executeValidationRule.md)(string $validationRuleName, $parameter, string $path, ?string &$errorMessage = null) : bool
    - private [getTransformedName](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/getTransformedName.md)(string $name, string $nameTransformer) : string
    - private [error](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-config"><b>config</b></span>

    This property holds the config for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-tags"><b>tags</b></span>

    An array of tagName => tagValue.
    
    



Methods
==============

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
- [GemHelper::executeNameValidationRule](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/executeNameValidationRule.md) &ndash; and return a boolean result.
- [GemHelper::executeValidationRule](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/executeValidationRule.md) &ndash; and return a boolean result.
- [GemHelper::getTransformedName](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/getTransformedName.md) &ndash; Transforms the name according to the given nameTransformer, and returns the transformed name.
- [GemHelper::error](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/error.md) &ndash; Throws an error.





Location
=============
Ling\Light_UploadGems\GemHelper\GemHelper<br>
See the source code of [Ling\Light_UploadGems\GemHelper\GemHelper](https://github.com/lingtalfi/Light_UploadGems/blob/master/GemHelper/GemHelper.php)



SeeAlso
==============
Previous class: [LightUploadGemsException](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Exception/LightUploadGemsException.md)<br>Next class: [GemHelperTool](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperTool.md)<br>
