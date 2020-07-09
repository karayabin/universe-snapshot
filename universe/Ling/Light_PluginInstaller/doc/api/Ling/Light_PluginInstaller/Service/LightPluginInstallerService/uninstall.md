[Back to the Ling/Light_PluginInstaller api](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller.md)<br>
[Back to the Ling\Light_PluginInstaller\Service\LightPluginInstallerService class](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService.md)


LightPluginInstallerService::uninstall
================



LightPluginInstallerService::uninstall — Uninstalls a registered plugin by its name.




Description
================


public [LightPluginInstallerService::uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstall.md)(string $name, ?array $options = []) : void




Uninstalls a registered plugin by its name.

Available options are:
- parentName: string, in the debug log, will help to indicate the relationship between the parent/child plugins.
         You probably never need this, it's used for internal purposes.
- indent: int=0. An internal option that I use to enhance the display of the debug (i.e. you probably should't mess with this).
         It's the number of indent chars to prefix the log message with.




Parameters
================


- name

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightPluginInstallerService::uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/Service/LightPluginInstallerService.php#L321-L389)


See Also
================

The [LightPluginInstallerService](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService.md) class.

Previous method: [install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/install.md)<br>Next method: [isInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/isInstalled.md)<br>

