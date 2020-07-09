[Back to the Ling/Light_PluginInstaller api](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller.md)<br>
[Back to the Ling\Light_PluginInstaller\Service\LightPluginInstallerService class](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService.md)


LightPluginInstallerService::synchronizeByCreateFile
================



LightPluginInstallerService::synchronizeByCreateFile — Tries to synchronize the database with the given [create file](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/pages/conception-notes.md#create-file).




Description
================


public [LightPluginInstallerService::synchronizeByCreateFile](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/synchronizeByCreateFile.md)(string $pluginName, string $createFile, ?array $syncOptions = [], ?array $options = []) : void




Tries to synchronize the database with the given [create file](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/pages/conception-notes.md#create-file).
If it fails, throws an exception detailing the errors.

We use the Light_DbSynchronizer plugin under the hood (Light_DbSynchronizer->synchronize).

$syncOptions are directly passed to the synchronize method.


Available options are:

- errorLevel: debug|error = debug




Parameters
================


- pluginName

    

- createFile

    

- syncOptions

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightPluginInstallerService::synchronizeByCreateFile](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/Service/LightPluginInstallerService.php#L634-L655)


See Also
================

The [LightPluginInstallerService](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService.md) class.

Previous method: [fetchRowColumn](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/fetchRowColumn.md)<br>Next method: [getPluginInstallFile](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getPluginInstallFile.md)<br>

