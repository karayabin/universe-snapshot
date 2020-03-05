[Back to the Ling/Light_PluginDatabaseInstaller api](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller.md)<br>
[Back to the Ling\Light_PluginDatabaseInstaller\Service\LightPluginDatabaseInstallerService class](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService.md)


LightPluginDatabaseInstallerService::registerInstaller
================



LightPluginDatabaseInstallerService::registerInstaller — Registers the given installer for the given plugin.




Description
================


public [LightPluginDatabaseInstallerService::registerInstaller](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/registerInstaller.md)(string $pluginName, $installer) : void




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
See the source code for method [LightPluginDatabaseInstallerService::registerInstaller](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/Service/LightPluginDatabaseInstallerService.php#L84-L87)


See Also
================

The [LightPluginDatabaseInstallerService](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/setContainer.md)<br>Next method: [getRegisteredPluginNames](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/getRegisteredPluginNames.md)<br>

