[Back to the Ling/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks api](https://github.com/lingtalfi/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks.md)<br>
[Back to the Ling\Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks\Light_PlanetInstaller\LightKitAdminJimToolboxPhpstormWidgetLinksPlanetInstaller class](https://github.com/lingtalfi/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/Light_PlanetInstaller/LightKitAdminJimToolboxPhpstormWidgetLinksPlanetInstaller.md)


LightKitAdminJimToolboxPhpstormWidgetLinksPlanetInstaller::onMapCopyAfter
================



LightKitAdminJimToolboxPhpstormWidgetLinksPlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [LightKitAdminJimToolboxPhpstormWidgetLinksPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/Light_PlanetInstaller/LightKitAdminJimToolboxPhpstormWidgetLinksPlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




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
See the source code for method [LightKitAdminJimToolboxPhpstormWidgetLinksPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/blob/master/Light_PlanetInstaller/LightKitAdminJimToolboxPhpstormWidgetLinksPlanetInstaller.php#L23-L48)


See Also
================

The [LightKitAdminJimToolboxPhpstormWidgetLinksPlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/Light_PlanetInstaller/LightKitAdminJimToolboxPhpstormWidgetLinksPlanetInstaller.md) class.



