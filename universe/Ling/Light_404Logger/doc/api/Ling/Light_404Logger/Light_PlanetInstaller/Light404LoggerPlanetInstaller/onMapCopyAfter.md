[Back to the Ling/Light_404Logger api](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger.md)<br>
[Back to the Ling\Light_404Logger\Light_PlanetInstaller\Light404LoggerPlanetInstaller class](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Light_PlanetInstaller/Light404LoggerPlanetInstaller.md)


Light404LoggerPlanetInstaller::onMapCopyAfter
================



Light404LoggerPlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [Light404LoggerPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Light_PlanetInstaller/Light404LoggerPlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




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
See the source code for method [Light404LoggerPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_404Logger/blob/master/Light_PlanetInstaller/Light404LoggerPlanetInstaller.php#L22-L33)


See Also
================

The [Light404LoggerPlanetInstaller](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Light_PlanetInstaller/Light404LoggerPlanetInstaller.md) class.



