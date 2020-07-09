[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)



The GemHelperInterface class
================
2020-04-13 --> 2020-05-26






Introduction
============

The GemHelperInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">GemHelperInterface</span>  {

- Methods
    - abstract public [setTags](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/setTags.md)(array $tags) : void
    - abstract public [getCustomConfig](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/getCustomConfig.md)() : array
    - abstract public [getCustomConfigValue](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/getCustomConfigValue.md)(string $key, ?bool $throwEx = true) : mixed
    - abstract public [applyNameTransform](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyNameTransform.md)(string $filename) : string
    - abstract public [applyNameValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyNameValidation.md)(string $filename) : true | string
    - abstract public [applyChunkValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyChunkValidation.md)(string $path) : true | string
    - abstract public [applyValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyValidation.md)(string $path) : true | string
    - abstract public [applyCopies](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyCopies.md)(string $path, ?array $options = []) : string

}






Methods
==============

- [GemHelperInterface::setTags](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/setTags.md) &ndash; Sets an array of tags that will be used in the applyCopies method.
- [GemHelperInterface::getCustomConfig](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/getCustomConfig.md) &ndash; Returns the custom config array attached to this instance.
- [GemHelperInterface::getCustomConfigValue](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/getCustomConfigValue.md) &ndash; Returns the custom config value corresponding to the given key.
- [GemHelperInterface::applyNameTransform](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyNameTransform.md) &ndash; Applies the defined name transformations to the given filename and returns the transformed filename.
- [GemHelperInterface::applyNameValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyNameValidation.md) &ndash; true if they all pass, or returns the error message returned by the first failing constraint otherwise.
- [GemHelperInterface::applyChunkValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyChunkValidation.md) &ndash; true if they all pass, or returns the error message returned by the first failing constraint otherwise.
- [GemHelperInterface::applyValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyValidation.md) &ndash; true if they all pass, or returns the error message returned by the first failing constraint otherwise.
- [GemHelperInterface::applyCopies](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyCopies.md) &ndash; Make the copies of the file which path was given, based on the defined configuration, and returns the path of the desired copy.





Location
=============
Ling\Light_UploadGems\GemHelper\GemHelperInterface<br>
See the source code of [Ling\Light_UploadGems\GemHelper\GemHelperInterface](https://github.com/lingtalfi/Light_UploadGems/blob/master/GemHelper/GemHelperInterface.php)



SeeAlso
==============
Previous class: [GemHelper](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper.md)<br>Next class: [LightUploadGemsService](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService.md)<br>
