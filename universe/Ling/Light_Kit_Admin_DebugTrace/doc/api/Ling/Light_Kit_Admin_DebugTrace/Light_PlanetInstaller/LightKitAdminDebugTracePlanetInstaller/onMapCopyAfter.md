[Back to the Ling/Light_Kit_Admin_DebugTrace api](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace.md)<br>
[Back to the Ling\Light_Kit_Admin_DebugTrace\Light_PlanetInstaller\LightKitAdminDebugTracePlanetInstaller class](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Light_PlanetInstaller/LightKitAdminDebugTracePlanetInstaller.md)


LightKitAdminDebugTracePlanetInstaller::onMapCopyAfter
================



LightKitAdminDebugTracePlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [LightKitAdminDebugTracePlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Light_PlanetInstaller/LightKitAdminDebugTracePlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




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
See the source code for method [LightKitAdminDebugTracePlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/Light_PlanetInstaller/LightKitAdminDebugTracePlanetInstaller.php#L22-L33)


See Also
================

The [LightKitAdminDebugTracePlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Light_PlanetInstaller/LightKitAdminDebugTracePlanetInstaller.md) class.



