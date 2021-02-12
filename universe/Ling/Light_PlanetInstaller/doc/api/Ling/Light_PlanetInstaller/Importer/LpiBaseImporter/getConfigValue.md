[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Importer\LpiBaseImporter class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter.md)


LpiBaseImporter::getConfigValue
================



LpiBaseImporter::getConfigValue — Fetches the $key property from the importer configuration and returns the result.




Description
================


protected [LpiBaseImporter::getConfigValue](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/getConfigValue.md)(string $key, ?bool $throwEx = true, ?$default = null) : void




Fetches the $key property from the importer configuration and returns the result.

If the key doesn't exist, either $throwEx is true, in which case we throw an error.
Otherwise (i.e. $throwEx=false) we return the default value.




Parameters
================


- key

    

- throwEx

    

- default

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LpiBaseImporter::getConfigValue](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Importer/LpiBaseImporter.php#L55-L64)


See Also
================

The [LpiBaseImporter](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter.md) class.

Previous method: [configure](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/configure.md)<br>Next method: [error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/error.md)<br>

