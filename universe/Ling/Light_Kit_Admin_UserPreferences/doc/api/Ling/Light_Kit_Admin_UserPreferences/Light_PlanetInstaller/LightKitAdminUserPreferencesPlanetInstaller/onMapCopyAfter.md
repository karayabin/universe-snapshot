[Back to the Ling/Light_Kit_Admin_UserPreferences api](https://github.com/lingtalfi/Light_Kit_Admin_UserPreferences/blob/master/doc/api/Ling/Light_Kit_Admin_UserPreferences.md)<br>
[Back to the Ling\Light_Kit_Admin_UserPreferences\Light_PlanetInstaller\LightKitAdminUserPreferencesPlanetInstaller class](https://github.com/lingtalfi/Light_Kit_Admin_UserPreferences/blob/master/doc/api/Ling/Light_Kit_Admin_UserPreferences/Light_PlanetInstaller/LightKitAdminUserPreferencesPlanetInstaller.md)


LightKitAdminUserPreferencesPlanetInstaller::onMapCopyAfter
================



LightKitAdminUserPreferencesPlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [LightKitAdminUserPreferencesPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Admin_UserPreferences/blob/master/doc/api/Ling/Light_Kit_Admin_UserPreferences/Light_PlanetInstaller/LightKitAdminUserPreferencesPlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




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
See the source code for method [LightKitAdminUserPreferencesPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Admin_UserPreferences/blob/master/Light_PlanetInstaller/LightKitAdminUserPreferencesPlanetInstaller.php#L22-L38)


See Also
================

The [LightKitAdminUserPreferencesPlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_UserPreferences/blob/master/doc/api/Ling/Light_Kit_Admin_UserPreferences/Light_PlanetInstaller/LightKitAdminUserPreferencesPlanetInstaller.md) class.



