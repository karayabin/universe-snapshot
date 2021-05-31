[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataPlanetInstaller class
================
2019-09-27 --> 2021-05-31






Introduction
============

The LightUserDataPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightUserDataPlanetInstaller</span> extends [LightUserDatabaseBasePlanetInstaller](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller.md) implements [LightPlanetInstallerInit3HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit3HookInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Properties
    - private [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) [$_output](#property-_output) ;

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDatabaseBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_PlanetInstaller/LightUserDataPlanetInstaller/init2.md)(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_PlanetInstaller/LightUserDataPlanetInstaller/undoInit2.md)(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [init3](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_PlanetInstaller/LightUserDataPlanetInstaller/init3.md)(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [undoInit3](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_PlanetInstaller/LightUserDataPlanetInstaller/undoInit3.md)(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - private [message](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_PlanetInstaller/LightUserDataPlanetInstaller/message.md)(string $message) : void

- Inherited methods
    - public LightUserDatabaseBasePlanetInstaller::__construct() : void
    - public LightUserDatabaseBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected LightUserDatabaseBasePlanetInstaller::getTableScope() : array | null

}




Properties
=============

- <span id="property-_output"><b>_output</b></span>

    This property holds the _output for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightUserDataPlanetInstaller::init2](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_PlanetInstaller/LightUserDataPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightUserDataPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_PlanetInstaller/LightUserDataPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- [LightUserDataPlanetInstaller::init3](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_PlanetInstaller/LightUserDataPlanetInstaller/init3.md) &ndash; Executes the init 3 phase of the install command.
- [LightUserDataPlanetInstaller::undoInit3](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_PlanetInstaller/LightUserDataPlanetInstaller/undoInit3.md) &ndash; Undoes the init 3 phase.
- [LightUserDataPlanetInstaller::message](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_PlanetInstaller/LightUserDataPlanetInstaller/message.md) &ndash; Writes a message to the output, assuming it's set.
- LightUserDatabaseBasePlanetInstaller::__construct &ndash; Builds the LightUserDatabaseBasePlanetInstaller instance.
- LightUserDatabaseBasePlanetInstaller::setContainer &ndash; Sets the container.
- LightUserDatabaseBasePlanetInstaller::getTableScope &ndash; Returns the table scope to use with the Light_DbSynchronizer tool.





Location
=============
Ling\Light_UserData\Light_PlanetInstaller\LightUserDataPlanetInstaller<br>
See the source code of [Ling\Light_UserData\Light_PlanetInstaller\LightUserDataPlanetInstaller](https://github.com/lingtalfi/Light_UserData/blob/master/Light_PlanetInstaller/LightUserDataPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightUserDataHelper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Helper/LightUserDataHelper.md)<br>Next class: [LightUserDataPluginInstaller](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_PluginInstaller/LightUserDataPluginInstaller.md)<br>
