[Back to the Ling/Light_Kit_Admin_UserDatabase api](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase.md)<br>
[Back to the Ling\Light_Kit_Admin_UserDatabase\Light_PlanetInstaller\LightKitAdminUserDatabasePlanetInstaller class](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Light_PlanetInstaller/LightKitAdminUserDatabasePlanetInstaller.md)


LightKitAdminUserDatabasePlanetInstaller::onMapCopyAfter
================



LightKitAdminUserDatabasePlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [LightKitAdminUserDatabasePlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Light_PlanetInstaller/LightKitAdminUserDatabasePlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




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
See the source code for method [LightKitAdminUserDatabasePlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/Light_PlanetInstaller/LightKitAdminUserDatabasePlanetInstaller.php#L24-L58)


See Also
================

The [LightKitAdminUserDatabasePlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Light_PlanetInstaller/LightKitAdminUserDatabasePlanetInstaller.md) class.



