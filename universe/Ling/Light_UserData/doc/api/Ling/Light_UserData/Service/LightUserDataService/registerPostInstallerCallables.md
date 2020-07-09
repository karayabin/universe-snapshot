[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::registerPostInstallerCallables
================



LightUserDataService::registerPostInstallerCallables — Registers all the post installers for this plugin.




Description
================


public [LightUserDataService::registerPostInstallerCallables](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/registerPostInstallerCallables.md)() : array




Registers all the post installers for this plugin.

See the [Light_PluginInstaller conception notes](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/pages/conception-notes.md) for more details.

Each item of the returned array is an array with the following structure:

- 0: level: int, the level on which to register the post installer callable
- 1: callable: callable, the post installer callable to execute




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightUserDataService::registerPostInstallerCallables](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L291-L299)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [getDependencies](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getDependencies.md)<br>Next method: [onUserGroupCreate](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/onUserGroupCreate.md)<br>

