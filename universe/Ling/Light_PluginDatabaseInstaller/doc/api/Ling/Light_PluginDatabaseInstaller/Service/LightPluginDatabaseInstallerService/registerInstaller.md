[Back to the Ling/Light_PluginDatabaseInstaller api](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller.md)<br>
[Back to the Ling\Light_PluginDatabaseInstaller\Service\LightPluginDatabaseInstallerService class](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService.md)


LightPluginDatabaseInstallerService::registerInstaller
================



LightPluginDatabaseInstallerService::registerInstaller — Registers the given installer for the given plugin.




Description
================


public [LightPluginDatabaseInstallerService::registerInstaller](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/registerInstaller.md)(string $pluginName, ?$installer) : void




Registers the given installer for the given plugin.
The installer can be one of:

- LightPluginDatabaseInstallerInterface instance
- array of [installer callable, uninstaller callable]




Parameters
================


- pluginName

    

- installer

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightPluginDatabaseInstallerService::registerInstaller](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/Service/LightPluginDatabaseInstallerService.php#L65-L68)


See Also
================

The [LightPluginDatabaseInstallerService](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/__construct.md)<br>Next method: [install](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/install.md)<br>

