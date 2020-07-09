[Back to the Ling/Light_FileWatcher api](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher.md)<br>
[Back to the Ling\Light_FileWatcher\Service\LightFileWatcherService class](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService.md)


LightFileWatcherService::onInitialize
================



LightFileWatcherService::onInitialize — Method called in response to [the Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).




Description
================


public [LightFileWatcherService::onInitialize](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/onInitialize.md)(Ling\Light\Events\LightEvent $event) : void




Method called in response to [the Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).

It will seek for monitored files changes.
And for every file that has actually changed, we re-install the plugin owning that file.




Parameters
================


- event

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightFileWatcherService::onInitialize](https://github.com/lingtalfi/Light_FileWatcher/blob/master/Service/LightFileWatcherService.php#L124-L130)


See Also
================

The [LightFileWatcherService](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService.md) class.

Previous method: [setMonitorFile](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/setMonitorFile.md)<br>Next method: [registerCallable](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService/registerCallable.md)<br>

