[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataServiceOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md)


LightUserDataServiceOld::registerPostInstallerCallables
================



LightUserDataServiceOld::registerPostInstallerCallables — Registers all the post installers for this plugin.




Description
================


public [LightUserDataServiceOld::registerPostInstallerCallables](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/registerPostInstallerCallables.md)() : array




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
See the source code for method [LightUserDataServiceOld::registerPostInstallerCallables](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataServiceOld.php#L296-L304)


See Also
================

The [LightUserDataServiceOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md) class.

Previous method: [getDependencies](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getDependencies.md)<br>Next method: [onUserGroupCreate](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/onUserGroupCreate.md)<br>

