[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LightPlanetInstallerService class
================
2020-12-08 --> 2021-02-11






Introduction
============

The LightPlanetInstallerService class.



Class synopsis
==============


class <span class="pl-k">LightPlanetInstallerService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;
    - protected [Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInterface[]](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInterface.md) [$installers](#property-installers) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Service/LightPlanetInstallerService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Service/LightPlanetInstallerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Service/LightPlanetInstallerService/setOptions.md)(array $options) : void
    - public [getInstallerInstance](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Service/LightPlanetInstallerService/getInstallerInstance.md)(string $planetDotName) : [LightPlanetInstallerInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInterface.md) | null
    - private [error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Service/LightPlanetInstallerService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    
    
    See the [Light_PlanetInstaller conception notes](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md) for more details.
    
    

- <span id="property-installers"><b>installers</b></span>

    The array of planetDotName => installer. It's a cache.
    
    



Methods
==============

- [LightPlanetInstallerService::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Service/LightPlanetInstallerService/__construct.md) &ndash; Builds the LightPlanetInstallerService instance.
- [LightPlanetInstallerService::setContainer](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Service/LightPlanetInstallerService/setContainer.md) &ndash; Sets the container.
- [LightPlanetInstallerService::setOptions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Service/LightPlanetInstallerService/setOptions.md) &ndash; Sets the options.
- [LightPlanetInstallerService::getInstallerInstance](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Service/LightPlanetInstallerService/getInstallerInstance.md) &ndash; Returns the planet installer instance for the given planetDotName if defined, or null otherwise.
- [LightPlanetInstallerService::error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Service/LightPlanetInstallerService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_PlanetInstaller\Service\LightPlanetInstallerService<br>
See the source code of [Ling\Light_PlanetInstaller\Service\LightPlanetInstallerService](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Service/LightPlanetInstallerService.php)



SeeAlso
==============
Previous class: [LpiWebRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository.md)<br>Next class: [LpiRepositoryUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil.md)<br>
