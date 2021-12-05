[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The UninstallUtil class
================
2020-12-08 --> 2021-07-08






Introduction
============

The UninstallUtil class.



Class synopsis
==============


class <span class="pl-k">UninstallUtil</span>  {

- Properties
    - private [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md)|null [$output](#property-output) ;
    - private [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UninstallUtil/__construct.md)() : void
    - public [setOutput](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UninstallUtil/setOutput.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [setContainer](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UninstallUtil/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [uninstall](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UninstallUtil/uninstall.md)(string $planetDotName, array $options) : void
    - private [message](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UninstallUtil/message.md)(string $msg, ?bool $br = true) : void

}




Properties
=============

- <span id="property-output"><b>output</b></span>

    This property holds the output for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [UninstallUtil::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UninstallUtil/__construct.md) &ndash; Builds the UpgradeUtil instance.
- [UninstallUtil::setOutput](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UninstallUtil/setOutput.md) &ndash; Sets the output.
- [UninstallUtil::setContainer](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UninstallUtil/setContainer.md) &ndash; Sets the container.
- [UninstallUtil::uninstall](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UninstallUtil/uninstall.md) &ndash; Uninstalls the given planet.
- [UninstallUtil::message](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UninstallUtil/message.md) &ndash; Writes a message to the output.





Location
=============
Ling\Light_PlanetInstaller\Util\UninstallUtil<br>
See the source code of [Ling\Light_PlanetInstaller\Util\UninstallUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/UninstallUtil.php)



SeeAlso
==============
Previous class: [TimConflictsReader](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/TimConflictsReader.md)<br>Next class: [UpgradeUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil.md)<br>
