[Back to the Ling/Light_PluginInstaller api](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller.md)<br>
[Back to the Ling\Light_PluginInstaller\Service\LightPluginInstallerService class](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService.md)


LightPluginInstallerService::fetchRowColumn
================



LightPluginInstallerService::fetchRowColumn — Returns the value of the given column in the given table, matching the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [LightPluginInstallerService::fetchRowColumn](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/fetchRowColumn.md)(string $table, string $column, $where, ?bool $throwEx = false) : string | false




Returns the value of the given column in the given table, matching the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
In case of no match, the method either returns false by default, or throws an exception if the throwEx flag is
set to true.




Parameters
================


- table

    

- column

    

- where

    

- throwEx

    


Return values
================

Returns string | false.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightPluginInstallerService::fetchRowColumn](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/Service/LightPluginInstallerService.php#L313-L333)


See Also
================

The [LightPluginInstallerService](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService.md) class.

Previous method: [tableHasColumnValue](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/tableHasColumnValue.md)<br>Next method: [getPluginInstallFile](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getPluginInstallFile.md)<br>

