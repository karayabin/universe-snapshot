[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\Light_PlanetInstaller\LightDatabasePlanetInstaller class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabasePlanetInstaller.md)


LightDatabasePlanetInstaller::onMapCopyAfter
================



LightDatabasePlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [LightDatabasePlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabasePlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).
It was first designed to allow  plugin authors to configure their light's service's conf file before the "logic installs" starts.

Note: This method was written with the intent to be overridden by the user (i.e you should override this method in a sub-class).



Parameters
================


- appDir

    

- output

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightDatabasePlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Database/blob/master/Light_PlanetInstaller/LightDatabasePlanetInstaller.php#L23-L51)


See Also
================

The [LightDatabasePlanetInstaller](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabasePlanetInstaller.md) class.



