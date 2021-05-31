[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The UpgradeUtil class
================
2020-12-08 --> 2021-05-31






Introduction
============

The UpgradeUtil class.



Class synopsis
==============


class <span class="pl-k">UpgradeUtil</span>  {

- Properties
    - private [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md)|null [$output](#property-output) ;
    - private [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - private array [$errorMessages](#property-errorMessages) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil/__construct.md)() : void
    - public [setOutput](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil/setOutput.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [setContainer](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [getErrorMessages](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil/getErrorMessages.md)() : array
    - public [upgrade](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil/upgrade.md)(string $appDir, array $planetDotNames, ?array $options = []) : void
    - private [error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-output"><b>output</b></span>

    This property holds the output for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-errorMessages"><b>errorMessages</b></span>

    This property holds the errorMessages for this instance.
    It's an array of items, each of which:
    
    - 0: planetDotName
    - 1: exception caught
    
    



Methods
==============

- [UpgradeUtil::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil/__construct.md) &ndash; Builds the UpgradeUtil instance.
- [UpgradeUtil::setOutput](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil/setOutput.md) &ndash; Sets the output.
- [UpgradeUtil::setContainer](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil/setContainer.md) &ndash; Sets the container.
- [UpgradeUtil::getErrorMessages](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil/getErrorMessages.md) &ndash; Returns the errorMessages of this instance.
- [UpgradeUtil::upgrade](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil/upgrade.md) &ndash; Try to upgrade the given planets located in the given working dir.
- [UpgradeUtil::error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_PlanetInstaller\Util\UpgradeUtil<br>
See the source code of [Ling\Light_PlanetInstaller\Util\UpgradeUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/UpgradeUtil.php)



SeeAlso
==============
Previous class: [UninstallUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UninstallUtil.md)<br>
