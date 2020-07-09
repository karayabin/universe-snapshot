[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)



The LightUploadGemsService class
================
2020-04-13 --> 2020-05-26






Introduction
============

The LightUploadGemsService class.



Class synopsis
==============


class <span class="pl-k">LightUploadGemsService</span>  {

- Properties
    - protected array [$pluginToDir](#property-pluginToDir) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [register](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/register.md)(string $pluginName, ?string $gemDirPath = null) : void
    - public [getHelper](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/getHelper.md)(string $gemId) : [GemHelperInterface](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface.md)
    - public [checkPhpFile](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/checkPhpFile.md)(array $phpFile) : void
    - public [checkFilename](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/checkFilename.md)(string $filename) : void

}




Properties
=============

- <span id="property-pluginToDir"><b>pluginToDir</b></span>

    Array of pluginName => gemDirPath.
    
    gemDirPath is an absolute path.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightUploadGemsService::__construct](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/__construct.md) &ndash; Builds the LightUploadGemsService instance.
- [LightUploadGemsService::setContainer](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/setContainer.md) &ndash; Sets the container.
- [LightUploadGemsService::register](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/register.md) &ndash; Registers the pluginName.
- [LightUploadGemsService::getHelper](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/getHelper.md) &ndash; Returns a GemHelperInterface associated with the given gemId, or throws an exception otherwise.
- [LightUploadGemsService::checkPhpFile](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/checkPhpFile.md) &ndash; Checks whether the given php file (usually from $_FILES) is erroneous, and throws an exception if it's the case.
- [LightUploadGemsService::checkFilename](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/checkFilename.md) &ndash; Checks whether the given filename is valid (i.e.





Location
=============
Ling\Light_UploadGems\Service\LightUploadGemsService<br>
See the source code of [Ling\Light_UploadGems\Service\LightUploadGemsService](https://github.com/lingtalfi/Light_UploadGems/blob/master/Service/LightUploadGemsService.php)



SeeAlso
==============
Previous class: [GemHelperInterface](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface.md)<br>
