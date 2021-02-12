[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Service\LightUserDatabaseService class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService.md)


LightUserDatabaseService::pluginOptionTablesAreReady
================



LightUserDatabaseService::pluginOptionTablesAreReady — Returns whether both the lud_plugin_option and lud_user_group_has_plugin_option tables are installed.




Description
================


public [LightUserDatabaseService::pluginOptionTablesAreReady](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService/pluginOptionTablesAreReady.md)() : bool




Returns whether both the lud_plugin_option and lud_user_group_has_plugin_option tables are installed.

This is to help plugin authors prevent potential problem such as the hook problem:
https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/pages/conception-notes.md#warning-with-hooks




Parameters
================

This method has no parameters.


Return values
================

Returns bool.








Source Code
===========
See the source code for method [LightUserDatabaseService::pluginOptionTablesAreReady](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Service/LightUserDatabaseService.php#L66-L80)


See Also
================

The [LightUserDatabaseService](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService.md) class.

Previous method: [setIsInstalling](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService/setIsInstalling.md)<br>Next method: [onCreateFileChange](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService/onCreateFileChange.md)<br>

