Ling/Light_Logger
================
2019-08-01 --> 2019-09-24




Table of contents
===========

- [LightLoggerService](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService.md) &ndash; The LightLoggerService class provides a simple logging system for a light application.
    - [LightLoggerService::__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/__construct.md) &ndash; Builds the LightLoggerService instance.
    - [LightLoggerService::addListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/addListener.md) &ndash; Registers a listener ($callable) for the given $channel(s).
    - [LightLoggerService::setFormat](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/setFormat.md) &ndash; Sets the format of the log messages passed to the listeners.
    - [LightLoggerService::setUseExpandedArray](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/setUseExpandedArray.md) &ndash; Sets the useExpandedArray.
    - [LightLoggerService::log](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/log.md) &ndash; Sends a the log $message to the given $channel.
    - [LightLoggerService::trace](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/trace.md) &ndash; Dispatches a log message on the "trace" channel.
    - [LightLoggerService::debug](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/debug.md) &ndash; Dispatches a log message on the "debug" channel.
    - [LightLoggerService::notice](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/notice.md) &ndash; Dispatches a log message on the "notice" channel.
    - [LightLoggerService::warn](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/warn.md) &ndash; Dispatches a log message on the "warn" channel.
    - [LightLoggerService::error](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/error.md) &ndash; Dispatches a log message on the "error" channel.
    - [LightLoggerService::fatal](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/fatal.md) &ndash; Dispatches a log message on the "fatal" channel.
- [LightFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener.md) &ndash; The LightFileLoggerListener class is a simple logger listener which writes the log messages to a specified file.
    - [LightFileLoggerListener::__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/__construct.md) &ndash; Builds the LightFileLoggerListener instance.
    - [LightFileLoggerListener::configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/configure.md) &ndash; Configures this instance.
    - [LightFileLoggerListener::listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/listen.md) &ndash; and possibly rotates the file when the file size gets too big.
- [LightLastMessageFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener.md) &ndash; The LightLastMessageFileLoggerListener class.
    - [LightLastMessageFileLoggerListener::__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/__construct.md) &ndash; Builds the LightLastMessageFileLoggerListener instance.
    - [LightLastMessageFileLoggerListener::setFile](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/setFile.md) &ndash; Sets the file.
    - [LightLastMessageFileLoggerListener::listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/listen.md) &ndash; Reacts to the given logger message in a specific way.
- [LightLoggerListenerInterface](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface.md) &ndash; The LightLoggerListenerInterface interface is the interface for all logger listeners.
    - [LightLoggerListenerInterface::listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface/listen.md) &ndash; Reacts to the given logger message in a specific way.


Dependencies
============
- [ArrayToString](https://github.com/lingtalfi/ArrayToString)
- [Bat](https://github.com/lingtalfi/Bat)
- [UniversalLogger](https://github.com/lingtalfi/UniversalLogger)


