[Back to the Ling/Light_PluginInstaller api](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller.md)<br>
[Back to the Ling\Light_PluginInstaller\Service\LightPluginInstallerService class](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService.md)


LightPluginInstallerService::install
================



LightPluginInstallerService::install — Installs the planet which [dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) is given.




Description
================


public [LightPluginInstallerService::install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/install.md)(string $planetDotName, ?array $options = []) : void




Installs the planet which [dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) is given.

Available options:
- force: bool=false, whether to call the install method of the plugin's installer, even if the plugin is already "logic installed"




Parameters
================


- planetDotName

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightPluginInstallerService::install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/Service/LightPluginInstallerService.php#L240-L277)


See Also
================

The [LightPluginInstallerService](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService.md) class.

Previous method: [setOutput](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setOutput.md)<br>Next method: [uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstall.md)<br>

