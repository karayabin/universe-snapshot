Ling/Light_DbSynchronizer
================
2020-06-19 --> 2021-06-28




Table of contents
===========

- [LightDbSynchronizerException](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Exception/LightDbSynchronizerException.md) &ndash; The LightDbSynchronizerException class.
- [LightDbSynchronizerHelper](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Helper/LightDbSynchronizerHelper.md) &ndash; The LightDbSynchronizerHelper class.
    - [LightDbSynchronizerHelper::guessScopeByCreateFile](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Helper/LightDbSynchronizerHelper/guessScopeByCreateFile.md) &ndash; Guess the scope from the given create file, and returns it.
    - [LightDbSynchronizerHelper::synchronizePlanetCreateFile](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Helper/LightDbSynchronizerHelper/synchronizePlanetCreateFile.md) &ndash; Synchronizes the database with the create file of the planet which dot name is given.
- [LightDbSynchronizerPlanetInstaller](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Light_PlanetInstaller/LightDbSynchronizerPlanetInstaller.md) &ndash; The LightDbSynchronizerPlanetInstaller class.
    - [LightDbSynchronizerPlanetInstaller::init2](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Light_PlanetInstaller/LightDbSynchronizerPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
    - [LightDbSynchronizerPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Light_PlanetInstaller/LightDbSynchronizerPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
    - LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
    - LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.
- [LightDbSynchronizerService](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md) &ndash; The LightDbSynchronizerService class.
    - [LightDbSynchronizerService::__construct](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/__construct.md) &ndash; Builds the LightDbSynchronizerService instance.
    - [LightDbSynchronizerService::setContainer](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/setContainer.md) &ndash; Sets the container.
    - [LightDbSynchronizerService::setOptions](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/setOptions.md) &ndash; Sets the options.
    - [LightDbSynchronizerService::synchronize](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/synchronize.md) &ndash; and returns whether the synchronization was perfectly executed.
    - [LightDbSynchronizerService::getLogErrorMessages](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getLogErrorMessages.md) &ndash; Returns the logErrorMessages of this instance.
    - [LightDbSynchronizerService::getLogDebugMessages](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService/getLogDebugMessages.md) &ndash; Returns the logDebugMessages of this instance.


Dependencies
============
- [Bat](https://github.com/lingtalfi/Bat)
- [CliTools](https://github.com/lingtalfi/CliTools)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Database](https://github.com/lingtalfi/Light_Database)
- [Light_DatabaseInfo](https://github.com/lingtalfi/Light_DatabaseInfo)
- [Light_Logger](https://github.com/lingtalfi/Light_Logger)
- [Light_PlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller)
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper)
- [SqlWizard](https://github.com/lingtalfi/SqlWizard)
- [UniverseTools](https://github.com/lingtalfi/UniverseTools)


