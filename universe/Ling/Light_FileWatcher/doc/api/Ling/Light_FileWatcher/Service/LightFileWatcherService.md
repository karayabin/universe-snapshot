[Back to the Ling/Light_FileWatcher api](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher.md)



The LightFileWatcherService class
================
2020-06-25 --> 2021-03-05






Introduction
============

The LightFileWatcherService class.



Class synopsis
==============


class <span class="pl-k">LightFileWatcherService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$callables](#property-callables) ;
    - protected array [$options](#property-options) ;
    - protected string [$monitorFile](#property-monitorFile) ;
    - private string [$realMonitorFile](#property-realMonitorFile) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/setOptions.md)(array $options) : void
    - public [setMonitorFile](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/setMonitorFile.md)(string $monitorFile) : void
    - public [onInitialize](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/onInitialize.md)(Ling\Light\Events\LightEvent $event) : void
    - public [registerCallable](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/registerCallable.md)(string $path, callable $fn) : void
    - protected [createMonitorFile](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/createMonitorFile.md)() : void
    - protected [monitorFiles](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/monitorFiles.md)() : void
    - public [debugLog](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/debugLog.md)(string $msg) : void
    - private [getHash](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/getHash.md)(string $path) : string
    - private [getMonitorFilePath](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/getMonitorFilePath.md)() : string
    - private [error](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-callables"><b>callables</b></span>

    This property holds the callables and paths information.
    It's an array of items, each of which:
    
    - 0: path
    - 1: callable
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    Available options are:
    
    - useDebug: bool=false.
             If true, debug messages are sent to the logs.
    
    For more details see the [Light_FileWatcher conception notes](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/pages/conception-notes.md).
    
    

- <span id="property-monitorFile"><b>monitorFile</b></span>

    This absolute path to the monitor file.
    
    The following tags can be used:
    
    - {app_dir}: the application directory.
    
    

- <span id="property-realMonitorFile"><b>realMonitorFile</b></span>

    This property holds the realMonitorFile for this instance.
    
    



Methods
==============

- [LightFileWatcherService::__construct](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/__construct.md) &ndash; Builds the LightFileWatcherService instance.
- [LightFileWatcherService::setContainer](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/setContainer.md) &ndash; Sets the container.
- [LightFileWatcherService::setOptions](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/setOptions.md) &ndash; Sets the options.
- [LightFileWatcherService::setMonitorFile](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/setMonitorFile.md) &ndash; Sets the monitorFile.
- [LightFileWatcherService::onInitialize](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/onInitialize.md) &ndash; Method called in response to [the Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
- [LightFileWatcherService::registerCallable](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/registerCallable.md) &ndash; Registers the callable to be executed when the file, which absolute path is given, is updated.
- [LightFileWatcherService::createMonitorFile](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/createMonitorFile.md) &ndash; Creates the monitor file.
- [LightFileWatcherService::monitorFiles](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/monitorFiles.md) &ndash; Monitor the files, and trigger the user's callback when a file change is detected.
- [LightFileWatcherService::debugLog](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/debugLog.md) &ndash; Sends a message to the log, if the useDebug options is true (or do nothing otherwise).
- [LightFileWatcherService::getHash](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/getHash.md) &ndash; Returns the hash for the file which path is given.
- [LightFileWatcherService::getMonitorFilePath](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/getMonitorFilePath.md) &ndash; Returns the absolute path to the monitor file.
- [LightFileWatcherService::error](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_FileWatcher\Service\LightFileWatcherService<br>
See the source code of [Ling\Light_FileWatcher\Service\LightFileWatcherService](https://github.com/lingtalfi/Light_FileWatcher/blob/master/Service/LightFileWatcherService.php)



SeeAlso
==============
Previous class: [LightFileWatcherException](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Exception/LightFileWatcherException.md)<br>
