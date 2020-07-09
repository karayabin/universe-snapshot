[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Classes\PluginOptionApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi.md)


PluginOptionApi::delete
================



PluginOptionApi::delete — Deletes the pluginOption rows matching the given where conditions, and returns the number of deleted rows.




Description
================


public [PluginOptionApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the pluginOption rows matching the given where conditions, and returns the number of deleted rows.
If where is null, all the rows of the table will be deleted.

False might be returned in case of a problem and if you don't catch db exceptions.




Parameters
================


- where

    

- markers

    


Return values
================

Returns false | int.








Source Code
===========
See the source code for method [PluginOptionApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/PluginOptionApi.php#L201-L205)


See Also
================

The [PluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi.md) class.

Previous method: [updatePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/updatePluginOptionById.md)<br>Next method: [deletePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/deletePluginOptionById.md)<br>

