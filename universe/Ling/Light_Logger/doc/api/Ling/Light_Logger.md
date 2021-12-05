Ling/Light_Logger
================
2019-08-01 --> 2021-08-05




Table of contents
===========

- [LightLoggerException](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Exception/LightLoggerException.md) &ndash; The LightLoggerException class.
- [LightLoggerHelper](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Helper/LightLoggerHelper.md) &ndash; The LightLoggerHelper class.
    - [LightLoggerHelper::copyListenersFromPluginToMaster](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Helper/LightLoggerHelper/copyListenersFromPluginToMaster.md) &ndash; Copies the listeners from the given planet to our open registration system.
    - [LightLoggerHelper::removeListenersFromMaster](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Helper/LightLoggerHelper/removeListenersFromMaster.md) &ndash; Removes the listeners (defined by the given planet) from the master.
- [BaseLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener.md) &ndash; The BaseLoggerListener class.
    - [BaseLoggerListener::__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener/__construct.md) &ndash; Builds the BaseLoggerListener instance.
    - [BaseLoggerListener::configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener/configure.md) &ndash; Configures this instance.
    - [LightLoggerListenerInterface::listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface/listen.md) &ndash; Reacts to the given logger message in a specific way.
- [LightCleanableFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightCleanableFileLoggerListener.md) &ndash; The LightCleanableFileLoggerListener class.
    - [LightCleanableFileLoggerListener::__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightCleanableFileLoggerListener/__construct.md) &ndash; Builds the LightCleanableFileLoggerListener instance.
    - [LightCleanableFileLoggerListener::setFile](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightCleanableFileLoggerListener/setFile.md) &ndash; Sets the file.
    - [LightCleanableFileLoggerListener::configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightCleanableFileLoggerListener/configure.md) &ndash; Configures this instance.
    - [LightCleanableFileLoggerListener::listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightCleanableFileLoggerListener/listen.md) &ndash; Reacts to the given logger message in a specific way.
- [LightFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener.md) &ndash; The LightFileLoggerListener class is a simple logger listener which writes the log messages to a specified file.
    - [LightFileLoggerListener::__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/__construct.md) &ndash; Builds the LightFileLoggerListener instance.
    - [LightFileLoggerListener::configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/configure.md) &ndash; Configures this instance.
    - [LightFileLoggerListener::listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/listen.md) &ndash; and possibly rotates the file when the file size gets too big.
- [LightLastMessageFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener.md) &ndash; The LightLastMessageFileLoggerListener class.
    - [LightLastMessageFileLoggerListener::__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/__construct.md) &ndash; Builds the LightLastMessageFileLoggerListener instance.
    - [LightLastMessageFileLoggerListener::setFile](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/setFile.md) &ndash; Sets the file.
    - [LightLastMessageFileLoggerListener::configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/configure.md) &ndash; Configures this instance.
    - [LightLastMessageFileLoggerListener::listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/listen.md) &ndash; Reacts to the given logger message in a specific way.
- [LightLoggerListenerInterface](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface.md) &ndash; The LightLoggerListenerInterface interface is the interface for all logger listeners.
    - [LightLoggerListenerInterface::listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface/listen.md) &ndash; Reacts to the given logger message in a specific way.
- [LightLoggerService](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService.md) &ndash; The LightLoggerService class provides a simple logging system for a light application.
    - [LightLoggerService::__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/__construct.md) &ndash; Builds the LightLoggerService instance.
    - [LightLoggerService::setContainer](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/setContainer.md) &ndash; Sets the container.
    - [LightLoggerService::addListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/addListener.md) &ndash; Registers a listener (callable) for the given $channel(s).
    - [LightLoggerService::log](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/log.md) &ndash; Sends a the log $message to the given $channel.
    - [LightLoggerService::trace](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/trace.md) &ndash; Dispatches a log message on the "trace" channel.
    - [LightLoggerService::debug](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/debug.md) &ndash; Dispatches a log message on the "debug" channel.
    - [LightLoggerService::notice](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/notice.md) &ndash; Dispatches a log message on the "notice" channel.
    - [LightLoggerService::warn](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/warn.md) &ndash; Dispatches a log message on the "warn" channel.
    - [LightLoggerService::error](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/error.md) &ndash; Dispatches a log message on the "error" channel.
    - [LightLoggerService::fatal](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/fatal.md) &ndash; Dispatches a log message on the "fatal" channel.


Dependencies
============
- [ArrayToString](https://github.com/lingtalfi/ArrayToString)
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [CliTools](https://github.com/lingtalfi/CliTools)
- [Light](https://github.com/lingtalfi/Light)
- [SicTools](https://github.com/lingtalfi/SicTools)
- [UniversalLogger](https://github.com/lingtalfi/UniversalLogger)


