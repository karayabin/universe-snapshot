[Back to the Ling/Light_PrettyError api](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError.md)<br>
[Back to the Ling\Light_PrettyError\Light_PlanetInstaller\LightPrettyErrorPlanetInstaller class](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Light_PlanetInstaller/LightPrettyErrorPlanetInstaller.md)


LightPrettyErrorPlanetInstaller::onMapCopyAfter
================



LightPrettyErrorPlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [LightPrettyErrorPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Light_PlanetInstaller/LightPrettyErrorPlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




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
See the source code for method [LightPrettyErrorPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_PrettyError/blob/master/Light_PlanetInstaller/LightPrettyErrorPlanetInstaller.php#L22-L33)


See Also
================

The [LightPrettyErrorPlanetInstaller](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Light_PlanetInstaller/LightPrettyErrorPlanetInstaller.md) class.



