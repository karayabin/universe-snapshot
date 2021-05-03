[Back to the Ling/Light_DebugTrace api](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace.md)<br>
[Back to the Ling\Light_DebugTrace\Light_PlanetInstaller\LightDebugTracePlanetInstaller class](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Light_PlanetInstaller/LightDebugTracePlanetInstaller.md)


LightDebugTracePlanetInstaller::onMapCopyAfter
================



LightDebugTracePlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [LightDebugTracePlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Light_PlanetInstaller/LightDebugTracePlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




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
See the source code for method [LightDebugTracePlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_DebugTrace/blob/master/Light_PlanetInstaller/LightDebugTracePlanetInstaller.php#L22-L33)


See Also
================

The [LightDebugTracePlanetInstaller](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Light_PlanetInstaller/LightDebugTracePlanetInstaller.md) class.



