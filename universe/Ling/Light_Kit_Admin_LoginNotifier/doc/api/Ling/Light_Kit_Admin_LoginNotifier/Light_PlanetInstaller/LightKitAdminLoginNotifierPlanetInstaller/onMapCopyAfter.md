[Back to the Ling/Light_Kit_Admin_LoginNotifier api](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier.md)<br>
[Back to the Ling\Light_Kit_Admin_LoginNotifier\Light_PlanetInstaller\LightKitAdminLoginNotifierPlanetInstaller class](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier/Light_PlanetInstaller/LightKitAdminLoginNotifierPlanetInstaller.md)


LightKitAdminLoginNotifierPlanetInstaller::onMapCopyAfter
================



LightKitAdminLoginNotifierPlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [LightKitAdminLoginNotifierPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier/Light_PlanetInstaller/LightKitAdminLoginNotifierPlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




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
See the source code for method [LightKitAdminLoginNotifierPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/Light_PlanetInstaller/LightKitAdminLoginNotifierPlanetInstaller.php#L22-L38)


See Also
================

The [LightKitAdminLoginNotifierPlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier/Light_PlanetInstaller/LightKitAdminLoginNotifierPlanetInstaller.md) class.



