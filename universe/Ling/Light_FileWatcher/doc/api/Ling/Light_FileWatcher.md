Ling/Light_FileWatcher
================
2020-06-25 --> 2021-06-28




Table of contents
===========

- [LightFileWatcherException](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Exception/LightFileWatcherException.md) &ndash; The LightFileWatcherException class.
- [LightFileWatcherPlanetInstaller](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Light_PlanetInstaller/LightFileWatcherPlanetInstaller.md) &ndash; The LightFileWatcherPlanetInstaller class.
    - [LightFileWatcherPlanetInstaller::init2](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Light_PlanetInstaller/LightFileWatcherPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
    - [LightFileWatcherPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Light_PlanetInstaller/LightFileWatcherPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
    - LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
    - LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.
- [LightFileWatcherService](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService.md) &ndash; The LightFileWatcherService class.
    - [LightFileWatcherService::__construct](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/__construct.md) &ndash; Builds the LightFileWatcherService instance.
    - [LightFileWatcherService::setContainer](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/setContainer.md) &ndash; Sets the container.
    - [LightFileWatcherService::setOptions](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/setOptions.md) &ndash; Sets the options.
    - [LightFileWatcherService::setMonitorFile](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/setMonitorFile.md) &ndash; Sets the monitorFile.
    - [LightFileWatcherService::onInitialize](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/onInitialize.md) &ndash; Method called in response to [the Ling.Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
    - [LightFileWatcherService::registerCallable](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/registerCallable.md) &ndash; Registers the callable to be executed when the file, which absolute path is given, is updated.
    - [LightFileWatcherService::debugLog](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/debugLog.md) &ndash; Sends a message to the log, if the useDebug options is true (or do nothing otherwise).


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [CliTools](https://github.com/lingtalfi/CliTools)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Logger](https://github.com/lingtalfi/Light_Logger)
- [Light_PlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller)


