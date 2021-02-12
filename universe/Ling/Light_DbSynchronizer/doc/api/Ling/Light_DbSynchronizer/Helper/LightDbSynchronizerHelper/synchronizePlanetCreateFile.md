[Back to the Ling/Light_DbSynchronizer api](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer.md)<br>
[Back to the Ling\Light_DbSynchronizer\Helper\LightDbSynchronizerHelper class](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Helper/LightDbSynchronizerHelper.md)


LightDbSynchronizerHelper::synchronizePlanetCreateFile
================



LightDbSynchronizerHelper::synchronizePlanetCreateFile — Synchronizes the database with the create file of the planet which dot name is given.




Description
================


public static [LightDbSynchronizerHelper::synchronizePlanetCreateFile](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Helper/LightDbSynchronizerHelper/synchronizePlanetCreateFile.md)(string $planetDotName, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, ?array $options = []) : void




Synchronizes the database with the create file of the planet which dot name is given.

The delete/update scope used is all the tables which start with the first defined table's prefix found in the create file.

So for instance if your create file's first defined table is lud_user, then the scope will be all tables in the current database
which starts with the prefix "lud_".

Available options are:
- scope: array=null, the scope to use




Parameters
================


- planetDotName

    

- container

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightDbSynchronizerHelper::synchronizePlanetCreateFile](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/Helper/LightDbSynchronizerHelper.php#L73-L90)


See Also
================

The [LightDbSynchronizerHelper](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Helper/LightDbSynchronizerHelper.md) class.

Previous method: [guessScopeByCreateFile](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Helper/LightDbSynchronizerHelper/guessScopeByCreateFile.md)<br>

