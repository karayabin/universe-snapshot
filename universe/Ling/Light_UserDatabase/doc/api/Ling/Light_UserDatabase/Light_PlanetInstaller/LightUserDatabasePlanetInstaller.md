[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The LightUserDatabasePlanetInstaller class
================
2019-07-19 --> 2021-06-15






Introduction
============

The LightUserDatabasePlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightUserDatabasePlanetInstaller</span> extends [LightDatabaseBasePlanetInstaller](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller.md) implements [LightPlanetInstallerInit3HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit3HookInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - private [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) [$_output](#property-_output) ;

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init3](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabasePlanetInstaller/init3.md)(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, ?array $options = []) : void
    - public [undoInit3](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabasePlanetInstaller/undoInit3.md)(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, ?array $options = []) : void
    - private [message](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabasePlanetInstaller/message.md)(string $message) : void

- Inherited methods
    - public LightDatabaseBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-_output"><b>_output</b></span>

    This property holds the _output for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightUserDatabasePlanetInstaller::init3](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabasePlanetInstaller/init3.md) &ndash; Executes the init 3 phase of the install command.
- [LightUserDatabasePlanetInstaller::undoInit3](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabasePlanetInstaller/undoInit3.md) &ndash; Undoes the init 3 phase.
- [LightUserDatabasePlanetInstaller::message](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabasePlanetInstaller/message.md) &ndash; Writes a message to the output, assuming it's set.
- LightDatabaseBasePlanetInstaller::__construct &ndash; Builds the LightDatabaseBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_UserDatabase\Light_PlanetInstaller\LightUserDatabasePlanetInstaller<br>
See the source code of [Ling\Light_UserDatabase\Light_PlanetInstaller\LightUserDatabasePlanetInstaller](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Light_PlanetInstaller/LightUserDatabasePlanetInstaller.php)



SeeAlso
==============
Previous class: [LightWebsiteUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface.md)<br>Next class: [MysqlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md)<br>
