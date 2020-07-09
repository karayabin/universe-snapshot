[Back to the Ling/Light_PluginInstaller api](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller.md)



The PluginInstallerInterface class
================
2020-02-07 --> 2020-06-23






Introduction
============

The PluginInstallerInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">PluginInstallerInterface</span>  {

- Methods
    - abstract public [install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/install.md)() : void
    - abstract public [isInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/isInstalled.md)() : bool
    - abstract public [uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/uninstall.md)() : void
    - abstract public [getDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/getDependencies.md)() : array

}






Methods
==============

- [PluginInstallerInterface::install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/install.md) &ndash; Installs the plugin in the light application.
- [PluginInstallerInterface::isInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
- [PluginInstallerInterface::uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/uninstall.md) &ndash; Uninstalls the plugin.
- [PluginInstallerInterface::getDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/getDependencies.md) &ndash; Returns the array of dependencies.





Location
=============
Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface<br>
See the source code of [Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/PluginInstaller/PluginInstallerInterface.php)



SeeAlso
==============
Previous class: [PluginInstallerExtensionInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Extension/PluginInstallerExtensionInterface.md)<br>Next class: [PluginPostInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginPostInstallerInterface.md)<br>
