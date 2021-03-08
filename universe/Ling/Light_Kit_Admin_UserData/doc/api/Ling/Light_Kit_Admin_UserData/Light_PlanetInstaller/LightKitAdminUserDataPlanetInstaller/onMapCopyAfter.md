[Back to the Ling/Light_Kit_Admin_UserData api](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData.md)<br>
[Back to the Ling\Light_Kit_Admin_UserData\Light_PlanetInstaller\LightKitAdminUserDataPlanetInstaller class](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_PlanetInstaller/LightKitAdminUserDataPlanetInstaller.md)


LightKitAdminUserDataPlanetInstaller::onMapCopyAfter
================



LightKitAdminUserDataPlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [LightKitAdminUserDataPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_PlanetInstaller/LightKitAdminUserDataPlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




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
See the source code for method [LightKitAdminUserDataPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/Light_PlanetInstaller/LightKitAdminUserDataPlanetInstaller.php#L22-L29)


See Also
================

The [LightKitAdminUserDataPlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_PlanetInstaller/LightKitAdminUserDataPlanetInstaller.md) class.



