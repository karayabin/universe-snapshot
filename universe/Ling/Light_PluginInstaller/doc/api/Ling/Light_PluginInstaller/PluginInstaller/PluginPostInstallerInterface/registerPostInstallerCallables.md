[Back to the Ling/Light_PluginInstaller api](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller.md)<br>
[Back to the Ling\Light_PluginInstaller\PluginInstaller\PluginPostInstallerInterface class](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginPostInstallerInterface.md)


PluginPostInstallerInterface::registerPostInstallerCallables
================



PluginPostInstallerInterface::registerPostInstallerCallables — Registers all the post installers for this plugin.




Description
================


abstract public [PluginPostInstallerInterface::registerPostInstallerCallables](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginPostInstallerInterface/registerPostInstallerCallables.md)() : array




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
See the source code for method [PluginPostInstallerInterface::registerPostInstallerCallables](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/PluginInstaller/PluginPostInstallerInterface.php#L26-L26)


See Also
================

The [PluginPostInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginPostInstallerInterface.md) class.



