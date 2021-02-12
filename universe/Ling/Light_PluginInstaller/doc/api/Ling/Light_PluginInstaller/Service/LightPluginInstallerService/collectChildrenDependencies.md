[Back to the Ling/Light_PluginInstaller api](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller.md)<br>
[Back to the Ling\Light_PluginInstaller\Service\LightPluginInstallerService class](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService.md)


LightPluginInstallerService::collectChildrenDependencies
================



LightPluginInstallerService::collectChildrenDependencies — Collects the children dependencies, recursively.




Description
================


private [LightPluginInstallerService::collectChildrenDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/collectChildrenDependencies.md)(string $planetDotName, array &$uninstallMap) : void




Collects the children dependencies, recursively.
This method assumes that the dependencies cache is fully built (i.e. every planet in the application has
a corresponding entry in the cache).




Parameters
================


- planetDotName

    

- uninstallMap

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightPluginInstallerService::collectChildrenDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/Service/LightPluginInstallerService.php#L470-L478)


See Also
================

The [LightPluginInstallerService](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService.md) class.

Previous method: [getUninstallMap](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getUninstallMap.md)<br>Next method: [getInstallMap](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getInstallMap.md)<br>

